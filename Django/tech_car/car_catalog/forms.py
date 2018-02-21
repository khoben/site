from django import forms
from car_catalog.models import *


class CarForm(forms.ModelForm):
    class Meta:
        model = Car
        fields = '__all__'
        labels = {
            'name': 'Наименование',
            'img_path': 'Изображение',
            'id_mark': 'Производитель',
            'id_category': 'Категория'
        }


class CharForm(forms.Form):
    def __init__(self, *args, **kwargs):
        super(CharForm, self).__init__(*args, **kwargs)
        # dynamic fields here ...
        mods = Modification.objects.all().values('id')
        values = []
        for mod in mods:
            values.append(Characteristicvalue.objects.filter(
                id_modification=mod['id']).annotate(name=F('id_char_name__name')).values('name', 'value', 'unit'))

        for value in values:
            for val in values:
                for v in val:
                    self.fields[v['name']] = forms.CharField(
                        max_length=128, required = False)
