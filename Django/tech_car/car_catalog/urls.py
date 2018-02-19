from django.urls import path
from . import views

urlpatterns = [
    path('', views.main_page, name='main_page'),
    path('item/', views.item_page, name='item_page'),
    path('edit/', views.edit_page, name='edit_page'),
    path('admin_page/', views.admin_page, name='admin_page'),
]
