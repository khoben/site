from django.urls import path, re_path
from django.conf.urls.static import static
from django.contrib.staticfiles.urls import staticfiles_urlpatterns
from django.conf import settings
from . import views

urlpatterns = [
    re_path('^$', views.main_page, name='main_page'),
    re_path('^car/(?P<id>\d+)/$', views.car_details, name='car_details'),
    re_path('^car/edit/(?P<id>\d+)/$', views.car_edit, name='car_edit'),
    re_path('^car/add/$', views.car_add, name='car_add'),
    re_path('^car/delete/(?P<id>\d+)/$', views.car_delete, name='car_delete'),
    path('admin_page/', views.admin_page, name='admin_page'),
]

urlpatterns += staticfiles_urlpatterns()
urlpatterns += static(settings.MEDIA_URL,
                      document_root=settings.MEDIA_ROOT)
