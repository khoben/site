from django.contrib import admin
from car_catalog.models import *

# Register your models here.


admin.site.register([Car, Category, Modification,
                     Characteristicname, Characteristicvalue, Mark])
