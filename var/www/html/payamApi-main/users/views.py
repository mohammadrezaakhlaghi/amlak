import base64

from django.core.files.base import ContentFile
from django.db.models import Q
from rest_framework.response import Response
from rest_framework.views import APIView

from .models import *


class signup(APIView):
    def post(self, request, format=None):
        try:
            user_name = self.request.POST.get('user_name')
            tel = self.request.POST.get('tel')
            username = self.request.POST.get('username')
            password = self.request.POST.get('password')
            priority_state_1 = self.request.POST.get('priority_state_1')
            priority_state_2 = self.request.POST.get('priority_state_2')
            priority_state_3 = self.request.POST.get('priority_state_3')
            priority_state_4 = self.request.POST.get('priority_state_4')
            priority_city_1 = self.request.POST.get('priority_city_1')
            priority_city_2 = self.request.POST.get('priority_city_2')
            priority_city_3 = self.request.POST.get('priority_city_3')
            priority_city_4 = self.request.POST.get('priority_city_4')
            type = self.request.POST.get('type')
            if user_name and tel and username and password and priority_state_1 and priority_state_2 and priority_state_3 and priority_state_4 and priority_city_1 and priority_city_2 and priority_city_3 and priority_city_4 and type:
                user = users.objects.filter(Q(tel=tel) | Q(username=username))
                if user.count() == 0:
                    user = users()
                    user.user_name = user_name
                    user.username = username
                    user.tel = tel
                    user.password = password
                    user.priority_state_1 = priority_state_1
                    user.priority_state_2 = priority_state_2
                    user.priority_state_3 = priority_state_3
                    user.priority_state_4 = priority_state_4
                    user.priority_state_4 = priority_state_4
                    user.priority_city_1 = priority_city_1
                    user.priority_city_2 = priority_city_2
                    user.priority_city_3 = priority_city_3
                    user.priority_city_4 = priority_city_4
                    user.type = type
                    if self.request.POST.get('img'):
                        ContentFile(base64.b64decode(self.request.POST.get('img')), name=str(user.id) + 'png')
                    user.save()
                    return Response({'success': 'true', 'id': user.id})
                else:
                    return Response({'success': 'false', 'message': 'Exist user'})
        except Exception as e:
            return Response({'success': 'false', 'message': str(e)})


class sendToAdmin(APIView):
    def post(self, request, format=None):
        try:
            id_user = self.request.POST.get('id_user')
            text = self.request.POST.get('text')
            type = self.request.POST.get('type')
            if id_user and text and type:
                a = admins()
                a.id_user = users.objects.get(id=id_user)
                a.text = text
                a.type = type
                a.save()
                return Response({'success': 'true', 'id': a.id})
        except Exception as e:
            return Response({'success': 'false', 'message': str(e)})


class sendMessage(APIView):
    def post(self, request, format=None):
        try:
            id_sender = self.request.POST.get('id_sender')
            id_receiver = self.request.POST.get('id_receiver')
            id_ad = self.request.POST.get('id_ad')
            user_tel = self.request.POST.get('user_tel')
            text = self.request.POST.get('text')
            if id_sender and id_receiver and id_ad and user_tel and text:
                if users.objects.get(id=id_sender).amount >= 30:
                    message = messages()
                    message.id_sender = users.objects.get(id=id_sender)
                    message.id_recv = users.objects.get(id=id_receiver)
                    message.id_ad = ads.objects.get(id=id_ad)
                    message.user_tel = user_tel
                    message.save()
                    if message:
                        a = users.objects.get(id=id_sender)
                        a.amount = a.amount - 30
                        a.save()
                return Response({'success': 'true'})
            else:
                return Response({'success': 'false', 'message': 'not enough amount'})
        except Exception as e:
            return Response({'success': 'false', 'message': str(e)})


class sendGift(APIView):
    def post(self, request, format=None):
        try:
            id_sender = self.request.POST.get('id_sender')
            id_receiver = self.request.POST.get('id_receiver')
            amount = self.request.POST.get('amount')
            if id_sender and id_receiver and amount:
                g = gifts()
                g.id_sender = users.objects.get(id=id_sender)
                g.id_recv = users.objects.get(id=id_receiver)
                g.amount = amount
                g.save()
            return Response({'success': 'true', 'id': g.id})
        except Exception as e:
            return Response({'success': 'false', 'message': str(e)})


class order(APIView):
    def post(self, request, format=None):
        try:
            idUser = self.request.POST.get('idUser')
            isFinally = self.request.POST.get('isFinally')
            price = self.request.POST.get('price')
            refId = self.request.POST.get('refId')
            o = orders()
            o.id_user = users.objects.get(id=idUser)
            o.is_finally = isFinally
            o.amount = price
            o.ref_id = refId
            o.save()
            user = users.objects.get(id=idUser)
            user.amount = user.amount + price
            user.save()
            return Response({'success': 'true', 'id': o.id})
        except Exception as e:
            return Response({'success': 'false', 'message': str(e)})


class login(APIView):
    def post(self, request, format=None):
        try:
            username = self.request.POST.get('username')
            password = self.request.POST.get('password')
            if username and password:
                user = users.objects.filter(Q(username=username) | Q(tel=username), password=password)
                if user.count() > 0:
                    for u in user:
                        return Response(
                            {'success': 'true', 'id': u.id, 'city1': u.priority_city_1, 'city2': u.priority_city_2,
                             'city3': u.priority_city_3, 'city4': u.priority_city_4, 'ostan1': u.priority_state_1,
                             'ostan2': u.priority_state_2, 'ostan3': u.priority_state_3,
                             'ostan4': u.priority_state_4})
                else:
                    return Response({'success': 'false'})
        except Exception as e:
            return Response({'success': 'false', 'message': str(e)})


class getReadyMessages(APIView):
    def post(self, request, format=None):
        try:
            type = self.request.POST.get('type')
            if type:
                message = messages.objects.filter(type=type)
                mArray = []
                for m in message:
                    mObj = {}
                    mObj['id'] = m.id
                    mObj['text'] = m.text
                    mObj['type'] = m.type
                    mObj['date'] = m.date_time
                    mArray.append(mObj)
                    return Response(
                        {'success': 'true', 'data': mArray})
                else:
                    return Response({'success': 'false'})
        except Exception as e:
            return Response({'success': 'false', 'message': str(e)})


class getProfile(APIView):
    def post(self, request, format=None):
        try:
            id = self.request.POST.get('id')
            if id:
                user = users.objects.filter(id=id)
                uArray = []
                for u in user:
                    uObj = {}
                    uObj['id'] = u.id
                    uObj['user_name'] = u.user_name
                    uObj['username'] = u.username
                    uObj['amount'] = u.amount
                    uObj['link'] = 'u.amount'
                    uArray.append(uObj)
                    return Response(
                        {'success': 'true', 'data': uArray})
                else:
                    return Response({'success': 'false'})
        except Exception as e:
            return Response({'success': 'false', 'message': str(e)})


class getOrders(APIView):
    def post(self, request, format=None):
        try:
            idUser = self.request.POST.get('idUser')
            if idUser:
                user = users.objects.filter(id=id)
                uArray = []
                for u in user:
                    uObj = {}
                    uObj['id'] = u.id
                    uObj['idUser'] = u.id_user
                    uObj['isFinally'] = u.is_finnaly
                    uObj['price'] = u.price
                    uObj['refId'] = u.ref_id
                    uObj['date'] = u.date_time
                    uArray.append(uObj)
                    return Response(
                        {'success': 'true', 'data': uArray})
                else:
                    return Response({'success': 'false'})
        except Exception as e:
            return Response({'success': 'false', 'message': str(e)})


class getMessages(APIView):
    def post(self, request, format=None):
        try:
            id_sender = self.request.POST.get('id_sender')
            id_receiver = self.request.POST.get('id_receiver')
            id_ad = self.request.POST.get('id_ad')
            if id_sender:
                message = messages.objects.filter(id_sender=users.objects.get(id=id_sender))
            elif id_receiver:
                message = messages.objects.filter(id_receiver=users.objects.get(id=id_receiver))
            elif id_ad:
                message = messages.objects.filter(id_ad=ads.objects.get(id=id_ad))
            else:
                message = messages.objects.all()
                mArray = []
                for m in message:
                    mObj = {}
                    mObj['id'] = m.id
                    mObj['id_ad'] = m.id_ad.id
                    mObj['img_ad'] = str(m.id_ad.img)
                    mObj['id_receiver'] = m.id_receiver.id
                    mObj['id_sender'] = m.id_sender.id
                    mObj['user_tel'] = m.user_tel
                    mObj['text'] = m.text
                    mObj['tel_sender'] = m.id_sender.tel
                    mObj['tel_receiver'] = m.id_receiver.tel
                    mObj['name_receiver'] = m.id_receiver.user_name
                    mObj['name_sender'] = m.id_sender.user_name
                    mObj['date'] = m.date_time
                    mArray.append(mObj)
                    return Response(
                        {'success': 'true', 'data': mArray})
                else:
                    return Response({'success': 'false'})
        except Exception as e:
            return Response({'success': 'false', 'message': str(e)})


class getFullProfile(APIView):
    def post(self, request, format=None):
        try:
            id = self.request.POST.get('id')
            if id:
                user = users.objects.filter(id=id)
                uArray = []
                for u in user:
                    uObj = {}
                    uObj['id'] = u.id
                    uObj['user_name'] = u.user_name
                    uObj['username'] = u.username
                    uObj['amount'] = u.amount
                    uObj['tel'] = u.tel
                    uObj['ostan1'] = u.priority_state_1
                    uObj['ostan2'] = u.priority_state_2
                    uObj['ostan3'] = u.priority_state_3
                    uObj['ostan4'] = u.priority_state_4
                    uObj['city1'] = u.priority_city_1
                    uObj['city2'] = u.priority_city_2
                    uObj['city3'] = u.priority_city_3
                    uObj['city4'] = u.priority_city_4
                    uObj['type'] = u.type
                    uObj['password'] = u.password
                    uArray.append(uObj)
                    return Response(
                        {'success': 'true', 'data': uArray})
                else:
                    return Response({'success': 'false'})
        except Exception as e:
            return Response({'success': 'false', 'message': str(e)})


class getAds(APIView):
    def post(self, request, format=None):
        try:
            mode = self.request.POST.get('mode')
            state1 = self.request.POST.get('state1')
            state2 = self.request.POST.get('state2')
            state3 = self.request.POST.get('state3')
            state4 = self.request.POST.get('state4')
            city1 = self.request.POST.get('city1')
            city2 = self.request.POST.get('city2')
            city3 = self.request.POST.get('city3')
            city4 = self.request.POST.get('city4')
            type = self.request.POST.get('type')
            month = self.request.POST.get('month')
            if mode == 'eftekharat':
                ad = ads.objects.get(type='افتخارات')
            else:
                ad = ads.objects.filter(
                    Q(state=state1) | Q(state=state2) | Q(state=state3) | Q(state=state4) | Q(city=city1) |
                    Q(city=city2) | Q(city=city3) | Q(city=city4), type=type, month=month)
                aArray = []
                for a in ad:
                    aObj = {}
                    aObj['id'] = a.id
                    aObj['state'] = a.state
                    aObj['month'] = a.month
                    aObj['type'] = a.type
                    aObj['id_user'] = a.id_user.id
                    aObj['ad_desc'] = a.ad_desc
                    aObj['img'] = a.img
                    aObj['ad_date'] = a.date_time
                    tel = tels.objects.filter(ad_id=a.id)
                    tArray = []
                    for t in tel:
                        tObj = {}
                        tObj['id'] = t.id
                        tObj['tel'] = t.tel
                        tObj['ad_id'] = t.ad_id
                        tArray.append(tObj)
                    aObj['tels'] = tArray
                    aArray.append(aObj)
                    return Response(
                        {'success': 'true', 'data': aArray})
                else:
                    return Response({'success': 'false'})
        except Exception as e:
            return Response({'success': 'false', 'message': str(e)})


class editProfile(APIView):
    def post(self, request, format=None):
        try:
            user_name = self.request.POST.get('user_name')
            tel = self.request.POST.get('tel')
            username = self.request.POST.get('username')
            password = self.request.POST.get('password')
            id = self.request.POST.get('id')
            priority_state_1 = self.request.POST.get('priority_state_1')
            priority_state_2 = self.request.POST.get('priority_state_2')
            priority_state_3 = self.request.POST.get('priority_state_3')
            priority_state_4 = self.request.POST.get('priority_state_4')
            priority_city_1 = self.request.POST.get('priority_city_1')
            priority_city_2 = self.request.POST.get('priority_city_2')
            priority_city_3 = self.request.POST.get('priority_city_3')
            priority_city_4 = self.request.POST.get('priority_city_4')
            type = self.request.POST.get('type')
            if user_name and tel and username and password and id and priority_state_1 and priority_state_2 and priority_state_3 and priority_state_4 and priority_city_1 and priority_city_2 and priority_city_3 and priority_city_4 and type:
                user = users.objects.get(id=id)
                user.user_name = user_name
                user.username = username
                user.password = password
                user.priority_state_1 = priority_state_1
                user.priority_state_2 = priority_state_2
                user.priority_state_3 = priority_state_3
                user.priority_state_4 = priority_state_4
                user.priority_city_1 = priority_city_1
                user.priority_city_2 = priority_city_2
                user.priority_city_3 = priority_city_3
                user.priority_city_4 = priority_city_4
                user.type = type
                user.save()
                if self.request.POST.get('img'):
                    ContentFile(base64.b64decode(self.request.POST.get('img')), name=id + 'png')
                return Response(
                    {'success': 'true'})
            else:
                return Response({'success': 'false'})
        except Exception as e:
            return Response({'success': 'false', 'message': str(e)})


class getSplash(APIView):
    def post(self, request, format=None):
        try:
            sp = splash.objects.last()
            return Response({'success': True, "link": str(sp.image)})
        except Exception as e:
            return Response({'success': False, 'message': str(e)})
            
            
            
class uploadImage(APIView):
    def post(self, request, format=None):
        try:
            userId = self.request.POST.get('userId')
            attach = self.request.FILES['attach']
            user = users.objects.get(id=userId)
            user.image = attach
            user.save()
            return Response({'success': True})
        except Exception as e:
            return Response({'success': False, 'message': str(e)})
