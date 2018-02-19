from django.shortcuts import render
from car_catalog.models import *
# Create your views here.


def main_page(request):
    cars = Car.objects.all()
    return render(request, 'index.html', {'cars': cars})


def item_page(request):
    return render(request, 'item-page.html', {})


def edit_page(request):
    return render(request, 'edit-page.html', {})


def admin_page(request):
    cars = Car.objects.all()
    return render(request, 'admin-page.html', {'cars': cars})
