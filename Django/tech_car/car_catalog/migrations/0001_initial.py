# Generated by Django 2.0.2 on 2018-02-19 05:24

from django.db import migrations, models
import django.db.models.deletion


class Migration(migrations.Migration):

    initial = True

    dependencies = [
    ]

    operations = [
        migrations.CreateModel(
            name='Car',
            fields=[
                ('id', models.BigAutoField(db_column='ID', primary_key=True, serialize=False)),
                ('name', models.CharField(blank=True, max_length=128, null=True)),
                ('img_path', models.CharField(blank=True, max_length=128, null=True)),
            ],
        ),
        migrations.CreateModel(
            name='Category',
            fields=[
                ('id', models.BigAutoField(primary_key=True, serialize=False)),
                ('name', models.CharField(blank=True, max_length=128, null=True)),
            ],
        ),
        migrations.CreateModel(
            name='Characteristic',
            fields=[
                ('id', models.BigAutoField(primary_key=True, serialize=False)),
                ('name', models.CharField(blank=True, max_length=128, null=True)),
                ('value', models.CharField(blank=True, max_length=128, null=True)),
                ('unit', models.CharField(blank=True, max_length=128, null=True)),
            ],
        ),
        migrations.CreateModel(
            name='Mark',
            fields=[
                ('id', models.BigAutoField(primary_key=True, serialize=False)),
                ('name', models.CharField(blank=True, max_length=128, null=True)),
            ],
        ),
        migrations.CreateModel(
            name='Modification',
            fields=[
                ('id', models.BigAutoField(primary_key=True, serialize=False)),
                ('name', models.CharField(blank=True, max_length=128, null=True)),
                ('id_car', models.ForeignKey(on_delete=django.db.models.deletion.DO_NOTHING, to='car_catalog.Car')),
            ],
        ),
        migrations.AddField(
            model_name='characteristic',
            name='id_modification',
            field=models.ForeignKey(on_delete=django.db.models.deletion.DO_NOTHING, to='car_catalog.Modification'),
        ),
        migrations.AddField(
            model_name='car',
            name='id_category',
            field=models.ForeignKey(on_delete=django.db.models.deletion.DO_NOTHING, to='car_catalog.Category'),
        ),
        migrations.AddField(
            model_name='car',
            name='id_mark',
            field=models.ForeignKey(on_delete=django.db.models.deletion.DO_NOTHING, to='car_catalog.Mark'),
        ),
    ]
