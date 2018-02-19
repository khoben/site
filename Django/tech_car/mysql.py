# This is an auto-generated Django model module.
# You'll have to do the following manually to clean this up:
#   * Rearrange models' order
#   * Make sure each model has one field with primary_key=True
#   * Make sure each ForeignKey has `on_delete` set to the desired behavior.
#   * Remove `managed = False` lines if you wish to allow Django to create, modify, and delete the table
# Feel free to rename the models, but don't rename db_table values or field names.
from django.db import models


class Car(models.Model):
    # Field name made lowercase.
    id = models.BigAutoField(db_column='ID', primary_key=True)
    name = models.CharField(max_length=128, blank=True, null=True)
    # Field name made lowercase.
    id_mark = models.ForeignKey(Mark, models.DO_NOTHING)
    # Field name made lowercase.
    id_category = models.ForeignKey(
        Category, models.DO_NOTHING)

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
        Modification, models.DO_NOTHING)

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
    id_car = models.ForeignKey(Car, models.DO_NOTHING)

    def __str__(self):
        return self.name
