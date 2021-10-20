from django.conf.urls import url

from users import views

urlpatterns = ([
    url(r'signup', views.signup.as_view()),
    url(r'sendToAdmin', views.sendToAdmin.as_view()),
    url(r'sendMessage', views.sendMessage.as_view()),
    url(r'sendGift', views.sendGift.as_view()),
    url(r'login', views.login.as_view()),
    url(r'getReadyMessages', views.getReadyMessages.as_view()),
    url(r'getProfile', views.getProfile.as_view()),
    url(r'getOrders', views.getOrders.as_view()),
    url(r'getMessages', views.getMessages.as_view()),
    url(r'getFullProfile', views.getFullProfile.as_view()),
    url(r'getAds', views.getAds.as_view()),
    url(r'editProfile', views.editProfile.as_view()),
    url(r'getSplash', views.getSplash.as_view()),
    url(r'uploadImage', views.uploadImage.as_view()),
])
