from django.db import models

# Create your models here.
class Breed(models.Model):
    breed_id = models.IntegerField(primary_key=True, unique=True )
    breed_name = models.CharField(max_length=12)
    def __str__(self):
        return self.breed_name


class Gene(models.Model):
    gene_id = models.IntegerField(primary_key=True, unique=True )
    gene_name = models.CharField(max_length=20)
    def __str__(self):
        return self.gene_name
