# This is an auto-generated Django model module.
# You'll have to do the following manually to clean this up:
#   * Rearrange models' order
#   * Make sure each model has one field with primary_key=True
#   * Make sure each ForeignKey has `on_delete` set to the desired behavior.
#   * Remove `managed = False` lines if you wish to allow Django to create, modify, and delete the table
# Feel free to rename the models, but don't rename db_table values or field names.
from django.db import models
from django.db.models import F

UPLOAD_FOLDER_ITEMS = 'item_pics'


class Car(models.Model):
    # Field name made lowercase.
    id = models.BigAutoField(db_column='ID', primary_key=True)
    name = models.CharField(max_length=128)
    #img_path = models.CharField(max_length=128, blank=True, null=True)
    img_path = models.ImageField(
        upload_to=UPLOAD_FOLDER_ITEMS)
    # Field name made lowercase.
    id_mark = models.ForeignKey('Mark', models.DO_NOTHING, db_column='ID_mark')
    # Field name made lowercase.
    id_category = models.ForeignKey(
        'Category', models.DO_NOTHING, db_column='ID_category')

    class Meta:
        managed = True
        db_table = 'car'
        app_label = 'car_catalog'

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
        values = []
        for mod in mods:
            values.append(Characteristicvalue.objects.filter(
                id_modification=mod['id']).annotate(name=F('id_char_name__name')).values('name', 'value', 'unit'))
        return values


class Category(models.Model):
    # Field name made lowercase.
    id = models.BigAutoField(db_column='ID', primary_key=True)
    name = models.CharField(max_length=128, blank=True, null=True)

    class Meta:
        managed = True
        db_table = 'category'
        app_label = 'car_catalog'

    def __str__(self):
        return self.name


class Modification(models.Model):
    # Field name made lowercase.
    id = models.BigAutoField(db_column='ID', primary_key=True)
    name = models.CharField(max_length=128, blank=True, null=True)
    # Field name made lowercase.
    id_car = models.ForeignKey('Car', models.DO_NOTHING, db_column='ID_car')

    class Meta:
        managed = True
        db_table = 'modification'
        app_label = 'car_catalog'

    def __str__(self):
        return self.name


class Characteristicname(models.Model):
    # Field name made lowercase.
    id = models.BigAutoField(db_column='ID', primary_key=True)
    name = models.CharField(max_length=128, blank=True, null=True)
    # Field name made lowercase.

    class Meta:
        managed = True
        db_table = 'characteristicname'
        app_label = 'car_catalog'

    def __str__(self):
        return self.name


class Characteristicvalue(models.Model):
    # Field name made lowercase.
    id = models.BigAutoField(db_column='ID', primary_key=True)
    value = models.CharField(max_length=128, blank=True, null=True)
    unit = models.CharField(max_length=128, blank=True, default='')
    # Field name made lowercase.
    id_char_name = models.ForeignKey(
        'Characteristicname', models.DO_NOTHING, db_column='ID_char_name', blank=True, null=True)

    id_modification = models.ForeignKey(
        'Modification', models.DO_NOTHING, db_column='ID_modification')

    class Meta:
        managed = True
        db_table = 'characteristicvalue'
        app_label = 'car_catalog'

    def __str__(self):
        if self.unit is None:
            self.unit = ''
        return self.id_char_name.name + ' ' + self.value + self.unit


class Mark(models.Model):
    # Field name made lowercase.
    id = models.BigAutoField(db_column='ID', primary_key=True)
    name = models.CharField(max_length=128, blank=True, null=True)

    class Meta:
        managed = True
        db_table = 'mark'
        app_label = 'car_catalog'

    def __str__(self):
        return self.name
