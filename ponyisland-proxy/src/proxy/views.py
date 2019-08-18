from django.shortcuts import render
from django.http import HttpResponse
import xml.etree.ElementTree as ET
import json
from urllib.request import urlopen
import dicttoxml
from .models import Breed, Gene

def fetch_pi_breed(breed_id):
    try:
        b = Breed.objects.get(breed_id=breed_id)
        return b['breed_name']
    except Breed.DoesNotExist:
        page = urlopen('http://get.ponyisland.net?breed={}'.format(breed_id))
        content = page.read()
        obj = json.loads(content)
        b = Breed(breed_name=obj['Name'], breed_id=obj['ID'])
        b.save()
        return obj['Name']

def fetch_pi_gene(gene_id):
    try:
        g = Gene.objects.get(gene_id=gene_id)
        return g['gene_name']
    except Gene.DoesNotExist:
        page = urlopen('http://get.ponyisland.net?gene={}'.format(gene_id))
        content = page.read()
        obj = json.loads(content)
        g = Gene(gene_name=obj['Name'], gene_id=obj['ID'])
        g.save()
        return obj['Name']

def fetch_pi_pony(pony_id):
    page = urlopen('http://get.ponyisland.net?pony={}'.format(pony_id))
    content = page.read()
    obj = json.loads(content)
    try:
        del(obj['OwnerID'])
        del(obj['Level'])
        del(obj['Inbreeding'])
        del(obj['Skills'])
    except Exception as e:
        # We don't really care, this is only removing excess info
        # so ok if it fails
        pass
    return obj

def remap_pi_sgenes(raw_sgenes):
    sgenes = []
    for gene in raw_sgenes:
        name = fetch_pi_gene(gene)
        if name == None:
            pass
        sgenes.append(name)
    return sgenes

def remap_pi_pony(raw_pony):
    clean_pony = {}
    clean_pony['id'] = raw_pony['ID']
    clean_pony['name'] = raw_pony['Name']
    clean_pony['breed'] = fetch_pi_breed(raw_pony['BreedID'])
    clean_pony['gender'] = 'Female' if raw_pony['Gender'] == 'F' else 'Male'
    clean_pony['colors'] = {}
    clean_pony['colors']['eyes'] = raw_pony['Colors']['Eyes']
    clean_pony['colors']['hair'] = raw_pony['Colors']['Hair']
    clean_pony['colors']['hair2'] = raw_pony['Colors']['Hair2']
    clean_pony['colors']['body'] = raw_pony['Colors']['Body']
    clean_pony['colors']['extra1'] = raw_pony['Colors']['Extra1']
    clean_pony['colors']['extra2'] = raw_pony['Colors']['Extra2']
    clean_pony['sgenes'] = remap_pi_sgenes(raw_pony['Genes'])
    
    return clean_pony


def index(request):
    return HttpResponse("Hello, world. You're at the piproxy index.")

def get_json(request):
    return get(request)

def get(request):

    pony = ET.Element('pony')

    # Query
    query = ET.SubElement(pony, 'query')
    for key, value in request.GET.items():
        el = ET.SubElement(query, 'param')
        el.set('name', key)
        el.text = value

    # Fetch pony from Pony Island
    pony_id = request.GET['pny']
    pi_pony_json = fetch_pi_pony(pony_id)

    if pi_pony_json['ID'] == None:
        # Pony not found
        error = ET.SubElement(pony, 'error')
        error.text = 'Enable to locate a pony with id {} on Pony Island, please make sure it exists.'.format(pony_id)
        pony_xml = ET.tostring(pony, encoding='utf8')
        return HttpResponse(pony_xml.decode(), content_type="application/xml")

    # Map the numbers to names
    remapped_pi_pony = remap_pi_pony(pi_pony_json)

    # Convert the JSON to XML
    pony_raw_xml = dicttoxml.dicttoxml(pi_pony_json, root=False).decode()
    pony_clean_xml = dicttoxml.dicttoxml(remapped_pi_pony, root=False).decode()

    # Raw Pony
    raw_pony_xml_string = ''.join(['<rawpony>', pony_raw_xml, '</rawpony>'])
    pony.append(ET.fromstring(raw_pony_xml_string))

    # Clean Pony
    clean_pony_xml_string = ''.join(['<cleanpony>', pony_clean_xml, '</cleanpony>'])
    pony.append(ET.fromstring(clean_pony_xml_string))


    # Pony Results
    
    # Name
    name = ET.SubElement(pony, 'name')
    name.text = remapped_pi_pony['name']

    # Breed
    breed = ET.SubElement(pony, 'breed')
    breed.text = remapped_pi_pony['breed']    
        
    # Gender
    gender = ET.SubElement(pony, 'gender')
    gender.text = remapped_pi_pony['gender']

    # Colors
    colors = ET.SubElement(pony, 'colors')

    # Colors -> Eyes
    eyes = ET.SubElement(colors, 'eyes')
    eyes.text = remapped_pi_pony['colors']['eyes']

    # Colors -> Hair
    hair = ET.SubElement(colors, 'hair')
    hair.text = remapped_pi_pony['colors']['hair']

    # Colors -> Stripe
    stripe = ET.SubElement(colors, 'stripe')
    stripe.text = remapped_pi_pony['colors']['hair2']

    # Colors -> Body
    body = ET.SubElement(colors, 'body')
    body.text = remapped_pi_pony['colors']['body']

    # Colors -> Extra1
    ex1 = ET.SubElement(colors, 'ex1')
    ex1.text = remapped_pi_pony['colors']['extra1']

    # Colors -> Extra2
    ex2 = ET.SubElement(colors, 'ex2')
    ex2.text = remapped_pi_pony['colors']['extra2']

    # SGenes
    sgenes = ET.SubElement(pony, 'sgenes')

    # SGenes -> Hair
    shair = ET.SubElement(sgenes, 'hair')
    shair.text = 'Rainbow'  
        
    # SGenes -> Socks
    ssocks = ET.SubElement(sgenes, 'socks')
    ssocks.text = 'Faded'  

    # SGenes -> Pattern
    spattern = ET.SubElement(sgenes, 'pattern')
    spattern.text = 'Faded'  

    # SGenes -> Face
    sface = ET.SubElement(sgenes, 'face')
    sface.text = 'Blaze'  

    pony_xml = ET.tostring(pony, encoding='utf8')
    return HttpResponse(pony_xml.decode(), content_type="application/xml")