from django.db import models

# Create your models here.

UPLOAD_FOLDER_ITEMS = 'static/assets/items'


class Car(models.Model):
    # Field name made lowercase.
    id = models.BigAutoField(db_column='ID', primary_key=True)
    name = models.CharField(max_length=128, blank=True, null=True)
    # Field name made lowercase.
    #img_path = models.CharField(max_length=128, blank=True, null=True)
    image = models.ImageField(
        upload_to=UPLOAD_FOLDER_ITEMS, blank=True)
    id_mark = models.ForeignKey('Mark', models.DO_NOTHING)
    # Field name made lowercase.
    id_category = models.ForeignKey(
        'Category', models.DO_NOTHING)

    def __str__(self):
        return self.name


class Category(models.Model):
    # Field name made lowercase.
    id = models.BigAutoField(primary_key=True)
    name = models.CharField(max_length=128, blank=True, null=True)

    def __str__(self):
        return self.name


class Characteristic(models.Model):
    # Field name made lowercase.
    id = models.BigAutoField(primary_key=True)
    name = models.CharField(max_length=128, blank=True, null=True)
    value = models.CharField(max_length=128, blank=True, null=True)
    unit = models.CharField(max_length=128, blank=True, null=True)
    # Field name made lowercase.
    id_modification = models.ForeignKey(
        'Modification', models.DO_NOTHING)

    def __str__(self):
        return self.name


class Mark(models.Model):
    # Field name made lowercase.
    id = models.BigAutoField(primary_key=True)
    name = models.CharField(max_length=128, blank=True, null=True)

    def __str__(self):
        return self.name


class Modification(models.Model):
    # Field name made lowercase.
    id = models.BigAutoField(primary_key=True)
    name = models.CharField(max_length=128, blank=True, null=True)
    # Field name made lowercase.
    id_car = models.ForeignKey('Car', models.DO_NOTHING)

    def __str__(self):
        return self.name
