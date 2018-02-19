from django.urls import path
from django.conf.urls.static import static
from django.contrib.staticfiles.urls import staticfiles_urlpatterns
from django.conf import settings
from . import views

urlpatterns = [
    path('', views.main_page, name='main_page'),
    path('item/', views.item_page, name='item_page'),
    path('edit/', views.edit_page, name='edit_page'),
    path('admin_page/', views.admin_page, name='admin_page'),
]

urlpatterns += staticfiles_urlpatterns()
urlpatterns += static(settings.MEDIA_URL,
                      document_root=settings.MEDIA_ROOT)
