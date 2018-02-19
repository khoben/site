from django.db import models
from django.db.models import ExpressionWrapper, Value
# Create your models here.

UPLOAD_FOLDER_ITEMS = 'item_pics'


class Car(models.Model):
    # Field name made lowercase.
    id = models.BigAutoField(db_column='ID', primary_key=True)
    name = models.CharField(max_length=128, blank=True, null=True)
    # Field name made lowercase.
    #img_path = models.CharField(max_length=128, blank=True, null=True)
    image = models.ImageField(
        upload_to=UPLOAD_FOLDER_ITEMS, blank=True)
    id_mark = models.ForeignKey('Mark', on_delete=models.CASCADE)
    # Field name made lowercase.
    id_category = models.ForeignKey(
        'Category', on_delete=models.CASCADE)

    def __str__(self):
        return self.name

    @property
    def get_mark_name(self):
        return self.id_mark.name

    @property
    def get_category_name(self):
        return self.id_category.name

    @property
    def get_char_values(self):
        mods = Modification.objects.filter(id_car=self.id).values('id')
        chars = []
        for mod in mods:
            chars.append(CharacteristicName.objects.filter(
                id_modification=mod['id']).values('id', 'name'))
        values = []
        for char in chars:
            for c in char:
                values.append(CharacteristicValue.objects.filter(
                    id_characteristicName=c['id']).values('unit', 'value')
                    .annotate(name=Value(c['name'], output_field=models.CharField())))
        print(values)
        return values


class Category(models.Model):
    # Field name made lowercase.
    id = models.BigAutoField(primary_key=True)
    name = models.CharField(max_length=128, blank=True, null=True)

    def __str__(self):
        return self.name


class CharacteristicName(models.Model):
    # Field name made lowercase.
    id = models.BigAutoField(primary_key=True)
    name = models.CharField(max_length=128, blank=True, null=True)
    # Field name made lowercase.
    id_modification = models.ForeignKey(
        'Modification', models.DO_NOTHING)

    def __str__(self):
        return self.name


class CharacteristicValue(models.Model):
    # Field name made lowercase.
    id = models.BigAutoField(primary_key=True)
    value = models.CharField(max_length=128, blank=True, null=True)
    unit = models.CharField(max_length=128, blank=True, null=True)
    # Field name made lowercase.
    id_characteristicName = models.ForeignKey(
        'CharacteristicName', on_delete=models.CASCADE)

    def __str__(self):
        return self.value + ' ' + self.unit


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
