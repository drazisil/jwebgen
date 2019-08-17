from django.http import HttpResponse
import xml.etree.ElementTree as ET


def index(request):
    return HttpResponse("Hello, world. You're at the piproxy index.")

def get(request):
    pony = ET.Element('pony')

    # Query
    query = ET.SubElement(pony, 'query')
    for key, value in request.GET.items():
        el = ET.SubElement(query, 'param')
        el.set('name', key)
        el.text = value

    # Name
    name = ET.SubElement(pony, 'name')
    name.text = 'Genny'

    # Breed
    breed = ET.SubElement(pony, 'breed')
    breed.text = 'EarthPony'    
        
    # Gender
    gender = ET.SubElement(pony, 'gender')
    gender.text = 'Female'    

    # Colors
    colors = ET.SubElement(pony, 'colors')

    # Colors -> Eyes
    eyes = ET.SubElement(colors, 'eyes')
    eyes.text = '000000'        

    # Colors -> Hair
    hair = ET.SubElement(colors, 'hair')
    hair.text = '000000'        

    # Colors -> Stripe
    stripe = ET.SubElement(colors, 'stripe')
    stripe.text = '000000'        

    # Colors -> Body
    body = ET.SubElement(colors, 'body')
    body.text = '000000'        

    # Colors -> Extra1
    ex1 = ET.SubElement(colors, 'ex1')
    ex1.text = '000000'        

    # Colors -> Extra2
    ex2 = ET.SubElement(colors, 'ex2')
    ex2.text = '000000'        

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