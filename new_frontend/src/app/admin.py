from django.contrib import admin

# Register your models here.
from .models import Breed, Gene

admin.site.register(Breed)
admin.site.register(Gene)
