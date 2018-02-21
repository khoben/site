from django.shortcuts import render, get_object_or_404, redirect
from car_catalog.models import *
from car_catalog.forms import CarForm, CharForm
# Create your views here.

# TODO: Добавить характеристики для добавления и редактирования

DEFAULT_CHARS = ['Масса',
                 'Высота выгрузки',
                 'Объем ковша',
                 'Грузоподъемность',
                 'Мощность двигателя',
                 'Тип шин',
                 'Тип двигателя']


def get_or_none(model, *args, **kwargs):
    try:
        return model.objects.get(*args, **kwargs)
    except model.DoesNotExist:
        return None


def main_page(request):
    cars = Car.objects.all()
    return render(request, 'index.html', {'cars': cars})


def car_details(request, id):
    car = get_object_or_404(Car, id=id)
    return render(request, 'item-page.html', {'car': car})


def car_edit(request, id):
    car = get_object_or_404(Car, id=id)
    btnName = 'Сохранить'
    pageName = 'Редактирование'
    if request.method == 'POST':
        carForm = CarForm(request.POST, request.FILES, instance=car)
        charForm = CharForm(request.POST)
        if carForm.is_valid() and charForm.is_valid():
            car = carForm.save(commit=False)

            # TODO: Если не было такой хар-ки добавим,
            # Если была -- отредактируем

            # 1. Выберем модификацию для машины

            modId = get_or_none(Modification, id_car=car)
            # 2. Если у машины небыло модификации создадим
            print(modId)
            if not modId:
                modId = Modification(
                    name='Модификация для '+car.name, id_car=car)
                modId.save()

            # 3. Для модификации найдем все хар-ки

            existChars = Characteristicvalue.objects.filter(
                id_modification=modId.id).annotate(name=F('id_char_name__name')).values('name', 'value', 'unit')

            # 4. Если харок нет, просто добавим все, что введено

            for charName in DEFAULT_CHARS:
                if charForm.cleaned_data[charName]:
                    found = False
                    for existCharName in existChars:
                        if existCharName['name'] == charName:
                            found = True
                            break
                    if not found:
                        idCharName = get_or_none(Characteristicname,
                                                 name=charName)

                        newChar = Characteristicvalue(
                            value=charForm.cleaned_data[charName],
                            id_char_name=idCharName,
                            id_modification=modId)
                        newChar.save()
                    else:
                        idCharName = Characteristicname.objects.get(
                            name=charName)
                        oldChar = get_or_none(
                            Characteristicvalue, id_modification=modId.id, id_char_name=idCharName.id)

                        oldChar.value = charForm.cleaned_data[charName]
                        oldChar.save()

            car.save()
            return redirect(car_details, id=car.id)
    else:
        carForm = CarForm(instance=car)
        modId = get_or_none(Modification, id_car=car)
        # 2. Если у машины небыло модификации создадим
        print(modId)
        if not modId:
            modId = Modification(
                name='Модификация для '+car.name, id_car=car)
            modId.save()

            # 3. Для модификации найдем все хар-ки

        existChars = Characteristicvalue.objects.filter(
            id_modification=modId.id).annotate(name=F('id_char_name__name')).values('name', 'value', 'unit')
        initialDict = {}
        for existChar in existChars:
            initialDict[existChar['name']] = existChar['value']
        charForm = CharForm(initial=initialDict)
    return render(request, 'edit-page.html', {'car': car, 'form': carForm, 'charForm': charForm, 'btnName': btnName, 'pageName': pageName})


def car_add(request):
    btnName = 'Добавить'
    pageName = 'Добавление'
    if request.method == "POST":
        carForm = CarForm(request.POST, request.FILES, prefix='carForm')
        charForm = CharForm(request.POST, prefix='charForm')

        if carForm.is_valid() and charForm.is_valid():
            car = carForm.save()

            print(car.id)

            modId = Modification(
                name='Модификация для '+car.name, id_car=car)

            modId.save()

            for charName in DEFAULT_CHARS:
                if charForm.cleaned_data[charName]:

                    idCharName = get_or_none(Characteristicname,
                                             name=charName)

                    newChar = Characteristicvalue(
                        value=charForm.cleaned_data[charName],
                        id_char_name=idCharName,
                        id_modification=modId)
                    newChar.save()

            car.save()
            return redirect(car_details, id=car.id)
    else:
        carForm = CarForm(prefix='carForm')
        charForm = CharForm(prefix='charForm')
    return render(request, 'edit-page.html', {'form': carForm, 'charForm': charForm, 'btnName': btnName, 'pageName': pageName})


def car_delete(request, id):
    shouldBeDeleted = get_object_or_404(Car, id=id).delete()
    return redirect(admin_page)


def admin_page(request):
    cars = Car.objects.all()
    return render(request, 'admin-page.html', {'cars': cars})
