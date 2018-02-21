# Generated by Django 2.0.2 on 2018-02-19 07:10

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('car_catalog', '0001_initial'),
    ]

    operations = [
        migrations.RemoveField(
            model_name='car',
            name='img_path',
        ),
        migrations.AddField(
            model_name='car',
            name='image',
            field=models.ImageField(blank=True, upload_to='car_catalog/static/assets/items'),
        ),
    ]