from django.http import HttpResponse
import xml.etree.ElementTree as ET


def index(request):
    return HttpResponse("Hello, world. You're at the piproxy index.")

def get(request):
    pony = ET.Element('pony')
    query = ET.SubElement(pony, 'query')
    for key, value in request.GET.items():
        el = ET.SubElement(query, 'param')
        el.set('name', key)
        el.text = value
        
    pony_xml = ET.tostring(pony, encoding='utf8')
    return HttpResponse(pony_xml.decode(), content_type="application/xml")