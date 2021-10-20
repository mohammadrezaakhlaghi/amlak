from django.db.models import Q
from django.shortcuts import render
from rest_framework.response import Response
from rest_framework.views import APIView
from django.contrib.auth.models import User
from rest_framework import generics
from rest_framework.parsers import FileUploadParser
from django.urls import path, include
from django.contrib.auth.models import User
from rest_framework import routers, serializers, viewsets
from .models import Users,Student,Teacher,Schools
from . import serializers
from datetime import datetime
import requests
import random

#
from atachs.models import EducationalTechnology,Magezin,UsageTips,OrderAdd,SampelQastion,SendFile
from chat.models import Chat,Menbur,Group
from cours.models import Comment,OrderTeacher,Cours,Order
from request.models import Follow,Check,Save,TeacherRequest,Point




class Pay(APIView):

    def post(self, request, format=None):

        try:

            amount = self.request.POST.get('amount')
            description = self.request.POST.get('description')
            tel = self.request.POST.get('tel')
            email = self.request.POST.get('email')
            url = self.request.POST.get('url')
            link = "http://classur.ir/zarinpal.php"
            payload = {'tel': tel,
                       'amount':amount,
                       'description':description,
                       'email':email,
                       'url':url,
                   }
            a=requests.request("POST", link, data=payload)
            b=a.text
            return Response({'success': True,'code':str(b)})
        except Exception as e:
            return Response({'success': False, 'message': str(e)})



class verify(APIView):

    def post(self, request, format=None):

        try:

            authority = self.request.POST.get('authority')
            amount = self.request.POST.get('amount')
           
            link = "http://classur.ir/verify.php"
            payload = {'amount': amount,
                       'authority':authority,
                       
                   }
            a=requests.request("POST", link, data=payload)
            b=a.text
            return Response({'success': True,'code':str(b)})
        except Exception as e:
            return Response({'success': False, 'message': str(e)})






class SherchTeacher(APIView):
    def post(self, request, format=None):
        try:
            a = self.request.POST.get('lesson')
            b = self.request.POST.get('price_meeting')
            c = self.request.POST.get('teach_level')
            d = self.request.POST.get('city')
            queryset = Teacher.objects.filter(Q(lesson__icontains=a) & Q(price_meeting__icontains=b) & Q(teach_level__icontains=c) & Q(city__icontains=d))

            serializer_class = serializers.TeacherSerializer(queryset, many=True).data
            return Response({'success': True, 'data': serializer_class})
        except Exception as e:
            return Response({'success': False, 'message': str(e)})


class BestTeacher(APIView):
    def post(self,request):
        try:
            teacher=Teacher.objects.order_by('-point')[0:12]
            teacherArray = []
            for t in teacher:
                teacherObj = {}
                teacherObj['image'] = t.image
                # -----------------
                teacherObj['id'] = t.id
                teacherObj['field_study'] = t.field_study
                teacherObj['user_id'] = t.user_id
                teacherObj['url'] = t.url
                teacherObj['degree_eductions'] = t.degree_eductions
                teacherObj['user_name'] = Users.objects.values_list('name', flat=True).get(id=t.user_id)
                teacherObj['city'] = t.city
                teacherObj['sex'] = t.sex
                teacherObj['data_birth'] = t.data_birth
                teacherObj['point'] = t.point
                teacherArray.append(teacherObj)
            return Response({'success': True, 'data': teacherArray})

        except Exception as e:
             return Response({'success': False,'message':str(e)})



# Create your views here.
class UserViewSet(viewsets.ModelViewSet):
    queryset = User.objects.all()
    serializer_class = serializers.UserSerializer


class Login(APIView):
    def post(self, request, format=None):
        try:
            userName = request.POST['userName']
            password = request.POST['password']
            user = Users.objects.filter(userName=userName, password=password)
            us = Users.objects.get(userName=userName, password=password)
            if user.count() > 0 and us.active == True :
                queryset = user
                serializer_class = serializers.UsersSerializer(queryset, many=True).data
                return Response({'success': True, 'data': serializer_class})
            else:
                return Response({'success': False,'massage':'USER NAME ALREDY EXESIT'})

        except Exception as e:
            return Response({'success': False, 'message': str(e)})


# api Users    /////v//////

class Getall(APIView):
    def post(self, request, format=None):
        try:

            queryset = Users.objects.filter(Q(school=True) | Q(teacher=True))

            serializer_class = serializers.UsersSerializer(queryset, many=True).data
            return Response({'success': True, 'data': serializer_class})
        except Exception as e:
            return Response({'success': False, 'message': str(e)})


class GetUsersss(APIView):
    def post(self, request, format=None):
        try:
            
            if self.request.POST.get('id'):
                queryset = Users.objects.filter(id=self.request.POST.get('id'))

            elif self.request.POST.get('userName'):
                queryset = Users.objects.filter(userName=self.request.POST.get('userName'))
            else:

                queryset = Users.objects.all()
        

            teacherArray = []
            for t in queryset:
                UserOject = {}
                UserOject['id'] = t.id
                UserOject['name'] = t.name
                UserOject['userName'] = t.userName
                UserOject['phone'] = t.phone
                UserOject['student'] = t.student
                UserOject['teacher'] = t.teacher
                UserOject['school'] = t.school
                UserOject['amount'] = t.amount
                UserOject['code'] = t.code
                UserOject['code_atho'] = t.code_atho
                UserOject['active'] = t.active
                teacherArray.append(UserOject)
            return Response({'success': True, 'data': teacherArray})
        except Exception as e:
            return Response({'success': False,'message':str(e)})

   


class AddUsers(APIView):

    def post(self, request, format=None):

        try:

            file_serializer = serializers.UsersSerializer(data=request.data)
            if file_serializer.is_valid():
                objectss = file_serializer.save()
                o=random.randint(25489, 99999)
                user = Users.objects.get(id=objectss.id)
                user.code_atho=o
                user.save()
                url = "http://ippanel.com:8080/"
                querystring = {"apikey": "rfGIRLxbt9uUy7eWZ9Xu3990BYvrGute3D0EVxFgGNQ=",
                               "fnum": "3000505", "tnum":objectss.phone , "p1": "name", "v1": o,
                               'pid': 'ju8hwivisl'}
                r = requests.request("GET", url, params=querystring)
              
                return Response({'success': True, 'id':objectss.id })
        except Exception as e:

            return Response({'success': False, 'message': str(e)})


class UpdateCode(APIView):
    def post(self, request, format=None):

        try:
            far=self.request.POST.get('id')
            o=random.randint(25489, 99999)
            user = Users.objects.get(id=far)
            user.code_atho=o
            user.save()
            url = "http://ippanel.com:8080/"
            querystring = {"apikey": "rfGIRLxbt9uUy7eWZ9Xu3990BYvrGute3D0EVxFgGNQ=",
                               "fnum": "3000505", "tnum":user.phone , "p1": "name", "v1": o,
                               'pid': 'ju8hwivisl'}
            r = requests.request("GET", url, params=querystring)
              
            return Response({'success': True, 'id':user.id })
        except Exception as e:

            return Response({'success': False, 'message': str(e)})
    



class CheckCode(APIView):
    def post(self, request, format=None):
        try:
            user = Users.objects.get(id=self.request.POST.get('id'))
            code=self.request.POST.get('code')
            if user.code_atho == code:
                user.active=True
                user.save()
                return Response({'success': True, 'id':user.id,'activ':user.active})
            else:
                return Response({'success': False,'massage':'CODE NOT VALIDE'})

        except Exception as e:
            return Response({'success': False, 'message': str(e)})

class EditUsers(APIView):
    def post(self, request, format=None):

        try:
            keyword = Users.objects.filter(id=self.request.POST.get('id'))
            keyword.update(
                name=self.request.POST.get('name'),
                userName=self.request.POST.get('userName'),
                phone=self.request.POST.get('phone'),
                student=self.request.POST.get('student'),
                teacher=self.request.POST.get('teacher'),
                school=self.request.POST.get('school'),
                amount=self.request.POST.get('amount'),
                code=self.request.POST.get('code'),
            )
            return Response({'success': True})
        except Exception as e:
            return Response({'success': False, 'message': e})


class DeleteUsers(APIView):
    def post(self, request, format=None):
        try:
            
            keyword = Users.objects.filter(id=self.request.POST.get('id'))
            keyword.delete()
            b=Student.objects.filter(user_id=self.request.POST.get('id'))
            c=Teacher.objects.filter(user_id=self.request.POST.get('id'))
            d=Schools.objects.filter(user_id=self.request.POST.get('id'))
            #
            e=EducationalTechnology.objects.filter(user_id=self.request.POST.get('id'))
            f=Magezin.objects.filter(user_id=self.request.POST.get('id'))
            g=OrderAdd.objects.filter(user_id=self.request.POST.get('id'))
            h=SampelQastion.objects.filter(user_id=self.request.POST.get('id'))
            r=SendFile.objects.filter(user_id=self.request.POST.get('id'))
            j=UsageTips.objects.filter(user_id=self.request.POST.get('id'))
            #chat
            k = Chat.objects.filter(sender_id=self.request.POST.get('id'))
            kk=Chat.objects.filter(recv_id=self.request.POST.get('id'))
            l = Group.objects.filter(user_id=self.request.POST.get('id'))
            m = Menbur.objects.filter(user_id=self.request.POST.get('id'))
            #COURS
            n = Comment.objects.filter(user_id=self.request.POST.get('id'))
            o = Cours.objects.filter(publish_id=self.request.POST.get('id'))
            p = Order.objects.filter(user_id=self.request.POST.get('id'))
            q = OrderTeacher.objects.filter(user_id=self.request.POST.get('id'))
             #request
            aa = Check.objects.filter(user_id=self.request.POST.get('id'))
            bb = Follow.objects.filter(user_id=self.request.POST.get('id'))
            cc = Follow.objects.filter(following_id=self.request.POST.get('id'))
            dd = Point.objects.filter(user_id=self.request.POST.get('id'))
            ee = Save.objects.filter(user_id=self.request.POST.get('id'))
            ff = TeacherRequest.objects.filter(user_id=self.request.POST.get('id'))
            
            if b:
                b.delete()
            if c:
                c.delete()
            if d:
                d.delete()
            if e:
                e.delete()
            if f:
                f.delete()
            if g:
                g.delete()
            if h:
                h.delete()
            if r:
                r.delete()
            if j:
                j.delete()
            if k:
                k.delete()
            if kk:
                kk.delete()
            if l:
                l.delete()
            if m:
                m.delete()
            if n:
                n.delete()
            if o:
                o.delete()
            if p:
                p.delete()
            if q:
                q.delete()
            if aa:
                aa.delete()
            if bb:
                bb.delete()
            if cc:
                cc.delete()
            if dd:
                dd.delete()
            if ee:
                ee.delete()
            if ff:
                ff.delete()
           
            return Response({'success': True})
        except Exception as e:
            return Response({'success': False, 'message': e})


# api Student

class GetStudent(APIView):
    def post(self, request, format=None):
        try:

            if self.request.POST.get('id'):
                queryset = Student.objects.filter(id=self.request.POST.get('id'))

            elif self.request.POST.get('user_id'):
                queryset = Student.objects.filter(user_id=self.request.POST.get('user_id'))
            else:

                queryset = Student.objects.all()

            teacherArray = []
            for t in queryset:
                studentObject = {}
                studentObject['id'] = t.id
                studentObject['image'] = t.image
                studentObject['state '] = t.field1
                studentObject['post_code'] = t.field2
                studentObject['honors'] = t.honors
                studentObject['field_study'] = t.field_study
                studentObject['university'] = t.university
                studentObject['user_id'] = t.user_id
                studentObject['city'] = t.city
                studentObject['degree_eductions'] = t.degree_eductions
                studentObject['addres'] = t.addres
                studentObject['sex'] = t.sex
                studentObject['email'] = t.email
                studentObject['national_code'] = t.national_code
                studentObject['data_birth'] = t.data_birth
                studentObject['point'] = t.point
                studentObject['about'] = t.about
                studentObject['url'] = t.url
                
                studentObject['user_name'] = Users.objects.values_list('name', flat=True).get(id=t.user_id)

                teacherArray.append(studentObject)
            return Response({'success': True, 'data': teacherArray})
        except Exception as e:
            return Response({'success': False,'message':str(e)})


class AddStudent(APIView):

    def post(self, request, format=None):

        try:

            if 'image' in self.request.FILES:
                image = Student_uploaded_file(self.request.FILES['image'])
            else:
                image = self.request.POST.get('image')
            honors = self.request.POST.get('honors')
            field_study = self.request.POST.get('field_study')
            university = self.request.POST.get('university')
            user_id = self.request.POST.get('user_id')
            city = self.request.POST.get('city')
            degree_eductions = self.request.POST.get('degree_eductions')
            addres = self.request.POST.get('addres')
            sex = self.request.POST.get('sex')
            email = self.request.POST.get('email')
            national_code = self.request.POST.get('national_code')
            data_birth = self.request.POST.get('data_birth')
            point = self.request.POST.get('point')
            about = self.request.POST.get('about')
            url = self.request.POST.get('url')
            field1 = self.request.POST.get('state')
            field2 = self.request.POST.get('post_code')
            pri = Student()
            pri.image = image
            pri.honors = honors
            pri.field_study = field_study
            pri.university = university
            pri.user_id = user_id
            pri.city = city
            pri.degree_eductions = degree_eductions
            pri.addres = addres
            pri.sex = sex
            pri.email = email
            pri.national_code = national_code
            pri.data_birth = data_birth
            pri.point = point
            pri.about = about
            pri.url = url
            pri.field1 = field1
            pri.field2 = field2

            pri.save()
            return Response({'success': True, 'id': str(pri.id)})
        except Exception as e:
            return Response({'success': False, 'message': str(e)})


class EditStudent(APIView):
    def post(self, request, format=None):

        try:
            keyword = Student.objects.filter(id=self.request.POST.get('id'))
            if 'image' in self.request.FILES:
                keyword.update(
                    image=Student_uploaded_file(self.request.FILES['image']),
                    honors=self.request.POST.get('honors'),
                    field_study=self.request.POST.get('field_study'),
                    university=self.request.POST.get('university'),
                    user_id=self.request.POST.get('user_id'),
                    city=self.request.POST.get('city'),
                    degree_eductions=self.request.POST.get('degree_eductions'),
                    addres=self.request.POST.get('addres'),
                    sex=self.request.POST.get('sex'),
                    email=self.request.POST.get('email'),
                    national_code=self.request.POST.get('national_code'),
                    data_birth=self.request.POST.get('data_birth'),
                    point=self.request.POST.get('point'),
                    about=self.request.POST.get('about'),
                    url=self.request.POST.get('url'),
                    field1 = self.request.POST.get('state'),
                    field2 = self.request.POST.get('post_code'),

                )

            else:
                keyword.update(
                    image=self.request.POST.get('image'),
                    honors=self.request.POST.get('honors'),
                    field_study=self.request.POST.get('field_study'),
                    university=self.request.POST.get('university'),
                    user_id=self.request.POST.get('user_id'),
                    city=self.request.POST.get('city'),
                    degree_eductions=self.request.POST.get('degree_eductions'),
                    addres=self.request.POST.get('addres'),
                    sex=self.request.POST.get('sex'),
                    email=self.request.POST.get('email'),
                    national_code=self.request.POST.get('national_code'),
                    data_birth=self.request.POST.get('data_birth'),
                    point=self.request.POST.get('point'),
                    about=self.request.POST.get('about'),
                    url=self.request.POST.get('url'), 
                    field1 = self.request.POST.get('state'),
                    field2 = self.request.POST.get('post_code'),
                    )

            return Response({'success': True})
        except Exception as e:
            return Response({'success': False, 'message': e})


class DeleteStudent(APIView):
    def post(self, request, format=None):
        try:
            keyword = Student.objects.filter(id=self.request.POST.get('id'))
            keyword.delete()
            return Response({'success': True})
        except Exception as e:
            return Response({'success': False, 'message': e})


# api for Schools #


class GetSchools(APIView):
    def post(self, request, format=None):
        try:
            if self.request.POST.get('id'):
                queryset = Schools.objects.filter(id=self.request.POST.get('id'))

            elif self.request.POST.get('user_id'):
                queryset = Schools.objects.filter(user_id=self.request.POST.get('user_id'))
            else:

                queryset = Schools.objects.all()

            teacherArray = []
            for t in queryset:
                SchoolObject = {}
                SchoolObject['id'] = t.id
                SchoolObject['image'] = t.image
                SchoolObject['post_code'] = t.field1
                SchoolObject['field2'] = t.field2
                SchoolObject['type_teach'] = t.type_teach
                SchoolObject['manage_name'] = t.manage_name
                SchoolObject['honors'] = t.honors
                SchoolObject['work_experience'] = t.work_experience
                SchoolObject['degree_education'] = t.degree_education
                SchoolObject['degree_education_image'] = t.degree_education_image
                SchoolObject['data_birth'] = t.data_birth
                SchoolObject['sex'] = t.sex
                SchoolObject['national_code'] = t.national_code
                SchoolObject['user_id'] = t.user_id
                SchoolObject['license_number'] = t.license_number
                SchoolObject['addres'] = t.addres
                SchoolObject['email'] = t.email
                SchoolObject['static_phone'] = t.static_phone
                SchoolObject['cart_number']=t.cart_number
                SchoolObject['point']=t.point
                SchoolObject['about']=t.about
                SchoolObject['license_image']=t.license_image
                SchoolObject['url']=t.url
                SchoolObject['national_code_image']=t.national_code_image
                SchoolObject['user_name'] = Users.objects.values_list('name', flat=True).get(id=t.user_id)
                teacherArray.append(SchoolObject)
            return Response({'success': True, 'data': teacherArray})
        except Exception as e:
            return Response({'success': False, 'message': str(e)})


class AddSchools(APIView):

    def post(self, request, format=None):

        try:
            if 'image' in self.request.FILES:
                image = School_uploaded_file(self.request.FILES['image'])
            else:
                image = checkField(self.request.POST.get('image'))
            type_teach = checkField(self.request.POST.get('type_teach'))
            manage_name = checkField(self.request.POST.get('manage_name'))
            honors = checkField(self.request.POST.get('honors'))
            national_code= checkField(self.request.POST.get('national_code'))
            work_experience = checkField(self.request.POST.get('work_experience'))
            degree_education = checkField(self.request.POST.get('degree_education'))
            if 'degree_education_image' in self.request.FILES:
                degree_education_image = School_uploaded_file(self.request.FILES['degree_education_image'])
            else:
                degree_education_image = checkField(self.request.POST.get('degree_education_image'))
            data_birth = checkField(self.request.POST.get('data_birth'))
            user_id = checkField(self.request.POST.get('user_id'))
            license_number = checkField(self.request.POST.get('license_number'))
            addres = checkField(self.request.POST.get('addres'))
            email = self.request.POST.get('email')
            static_phone = checkField(self.request.POST.get('static_phone'))
            cart_number = checkField(self.request.POST.get('cart_number'))
            point = checkField(self.request.POST.get('point'))
            sex = checkField(self.request.POST.get('sex'))
            about = checkField(self.request.POST.get('about'))
            if 'license_image' in self.request.FILES:
                license_image = School_uploaded_file(self.request.FILES['license_image'])
            else:
                license_image = checkField(self.request.POST.get('license_image'))
            url = checkField(self.request.POST.get('url'))
            if 'national_code_image' in self.request.FILES:
                national_code_image = School_uploaded_file(self.request.FILES['national_code_image'])
            else:
                national_code_image = checkField(self.request.POST.get('national_code_image'))
            field1 = self.request.POST.get('post_code')
            field2 ='null'
            pri = Schools()
            pri.image = image
            pri.type_teach = type_teach
            pri.manage_name = manage_name
            pri.honors = honors
            pri.work_experience = work_experience
            pri.degree_education = degree_education
            pri.degree_education_image = degree_education_image
            pri.data_birth = data_birth
            pri.user_id = user_id
            pri.license_number = license_number
            pri.addres = addres
            pri.email = email
            pri.static_phone = static_phone
            pri.cart_number = cart_number
            pri.point = point
            pri.about = about
            pri.sex=sex
            pri.license_image = license_image
            pri.url = url
            pri.national_code_image = national_code_image
            pri.national_code=national_code
            pri.field1=field1
            pri.field2=field2
            pri.save()
            return Response({'success': True, 'id': str(pri.id)})
        except Exception as e:
            return Response({'success': False, 'message': str(e)})


class EditSchools(APIView):
    def post(self, request, format=None):

        try:
            keyword = Schools.objects.filter(id=self.request.POST.get('id'))
            if self.request.POST.get('image'):
                keyword.update(

                    image=self.request.POST.get('image'),
                    type_teach=self.request.POST.get('type_teach'),
                    manage_name=self.request.POST.get('manage_name'),
                    honors=self.request.POST.get('honors'),
                    national_code=self.request.POST.get('national_code'),
                    work_experience=self.request.POST.get('work_experience'),
                    degree_education=self.request.POST.get('degree_education'),
                    degree_education_image=self.request.POST.get('degree_education_image'),
                    data_birth=self.request.POST.get('data_birth'),
                    user_id=self.request.POST.get('user_id'),
                    license_number=self.request.POST.get('license_number'),
                    addres=self.request.POST.get('addres'),
                    sex=self.request.POST.get('sex'),
                    email=self.request.POST.get('email'),
                    static_phone=self.request.POST.get('static_phone'),
                    cart_number=self.request.POST.get('cart_number'),
                    point=self.request.POST.get('point'),
                    about=self.request.POST.get('about'),
                    license_image=self.request.POST.get('license_image'),
                    url=self.request.POST.get('url'),
                    national_code_image=self.request.POST.get('national_code_image'),
                    field1 = self.request.POST.get('post_code'),

                    )
            else:
                
                if 'image' in self.request.FILES :
                    image = self.request.FILES['image']
                else:
                    image = "NONE"
                
                if 'degree_education_image' in self.request.FILES :
                    degree_education_image = self.request.FILES['degree_education_image']
                else:
                    degree_education_image = "NONE"
                
                if 'license_image' in self.request.FILES :
                    license_image = self.request.FILES['license_image']
                else:
                    license_image = "NONE"
                    
                if 'national_code_image' in self.request.FILES :
                    national_code_image = self.request.FILES['national_code_image']
                else:
                    national_code_image = "NONE"
                    
                a = keyword.update(

                    image=School_uploaded_file(image),
                    type_teach=self.request.POST.get('type_teach'),
                    manage_name=self.request.POST.get('manage_name'),
                    honors=self.request.POST.get('honors'),
                    national_code=self.request.POST.get('national_code'),
                    work_experience=self.request.POST.get('work_experience'),
                    degree_education=self.request.POST.get('degree_education'),
                    degree_education_image=School_uploaded_file(degree_education_image),
                    data_birth=self.request.POST.get('data_birth'),
                    user_id=self.request.POST.get('user_id'),
                    license_number=self.request.POST.get('license_number'),
                    addres=self.request.POST.get('addres'),
                    sex=self.request.POST.get('sex'),
                    email=self.request.POST.get('email'),
                    static_phone=self.request.POST.get('static_phone'),
                    cart_number=self.request.POST.get('cart_number'),
                    point=self.request.POST.get('point'),
                    about=self.request.POST.get('about'),
                    license_image=School_uploaded_file(license_image),
                    url=self.request.POST.get('url'),
                    national_code_image=School_uploaded_file(national_code_image),
                    field1 = self.request.POST.get('post_code'),

                )
                


            return Response({'success': True, 'check':a})
        except Exception as e:
            return Response({'success': False, 'message': str(e)})


class DeleteSchools(APIView):
    def post(self, request, format=None):
        try:
            keyword = Schools.objects.filter(id=self.request.POST.get('id'))
            keyword.delete()
            return Response({'success': True})
        except Exception as e:
            return Response({'success': False, 'message': e})


# api Teacher  #


class GetTeacher(APIView):
    def post(self, request, format=None):
        try:
            if self.request.POST.get('id'):
                queryset = Teacher.objects.filter(id=self.request.POST.get('id'))

            elif self.request.POST.get('user_id'):
                queryset = Teacher.objects.filter(user_id=self.request.POST.get('user_id'))
            else:
                queryset = Teacher.objects.all()
            teacherArray = []
            for t in queryset:
                teacherObj = {}
                teacherObj['image'] = t.image
                teacherObj['stute1_tecch'] = t.stute1_tecch
                teacherObj['state'] = t.field1
                teacherObj['post_code'] = t.field2
                teacherObj['job_address'] = t.field3
                teacherObj['field_study'] = t.field_study
                teacherObj['uni'] = t.uni
                teacherObj['static_phone'] = t.static_phone
                teacherObj['degree_education_image'] = t.degree_education_image
                teacherObj['honors'] = t.honors
                teacherObj['tutoring'] = t.tutoring
                teacherObj['lesson'] = t.lesson
                teacherObj['type_teach'] = t.type_teach
                teacherObj['software'] = t.software
                teacherObj['price_meeting'] = t.price_meeting
                teacherObj['place'] = t.place
                teacherObj['sex_student'] = t.sex_student
                teacherObj['count_meeting'] = t.count_meeting
                teacherObj['sample_video'] = t.sample_video
                teacherObj['other'] = t.other
                teacherObj['image_savabgh']=t.image_savabgh
                teacherObj['teach_level']=t.teach_level
                #-----------------
                teacherObj['id'] = t.id
                teacherObj['user_id'] = t.user_id
                teacherObj['user_name'] = Users.objects.values_list('name', flat=True).get(id=t.user_id)
                teacherObj['city'] = t.city
                teacherObj['degree_eductions'] = t.degree_eductions
                teacherObj['addres'] = t.addres
                teacherObj['sex'] = t.sex
                teacherObj['email'] = t.email
                teacherObj['national_code'] = t.national_code
                teacherObj['data_birth'] = t.data_birth
                teacherObj['point'] = t.point
                teacherObj['about'] = t.about
                teacherObj['url'] = t.url
                teacherObj['cart_number'] = t.cart_number
                teacherObj['license_image'] = t.license_image
                teacherObj['national_code_image'] = t.national_code_image
                teacherObj['savabegh'] = t.savabegh
                teacherArray.append(teacherObj)
            return Response({'success': True, 'data': teacherArray})
        except Exception as e:
            return Response({'success': False,'massage':str(e)})


class AddTeacher(APIView):

    def post(self, request, format=None):

        try:
            

            if 'image' in self.request.FILES:
                

                image = Teacher_uploaded(self.request.FILES['image'])
            else:
                

                image = self.request.POST.get('image')
            stute1_tecch = self.request.POST.get('stute1_tecch')
            field_study = self.request.POST.get('field_study')
            uni = checkField(self.request.POST.get('uni'))
            static_phone = self.request.POST.get('static_phone')
            if 'degree_education_image' in self.request.FILES:
                
                degree_education_image=Teacher_uploaded(self.request.FILES['degree_education_image'])
            else:
                degree_education_image = self.request.POST.get('degree_education_image')
                
            if 'image_savabgh' in self.request.FILES:
                
                image_savabgh=Teacher_uploaded(self.request.FILES['image_savabgh'])
            else:
                
                image_savabgh=self.request.POST.get('image_savabgh')

            teach_level=self.request.POST.get('teach_level')
            honors = self.request.POST.get('honors')
            tutoring = self.request.POST.get('tutoring')
            lesson = self.request.POST.get('lesson')
            type_teach = self.request.POST.get('type_teach')
            software = self.request.POST.get('software')
            price_meeting = self.request.POST.get('price_meeting')
            place = self.request.POST.get('place')
            sex_student = self.request.POST.get('sex_student')
            count_meeting = self.request.POST.get('count_meeting')
            if 'sample_video' in self.request.FILES:
                sample_video=Video_uploaded_file(self.request.FILES['sample_video'])
            else:
                sample_video = self.request.POST.get('sample_video')
            other = self.request.POST.get('other')
            user_id = self.request.POST.get('user_id')
            city = self.request.POST.get('city')
            degree_eductions = self.request.POST.get('degree_eductions')
            addres = self.request.POST.get('addres')
            sex = self.request.POST.get('sex')
            email = self.request.POST.get('email')
            national_code = self.request.POST.get('national_code')
            data_birth = self.request.POST.get('data_birth')
            point = self.request.POST.get('point')
            about = self.request.POST.get('about')
            url = self.request.POST.get('url')
            cart_number = self.request.POST.get('cart_number')
            if 'license_image' in self.request.FILES:
                license_image=Teacher_uploaded(self.request.FILES['license_image'])
            else:

                license_image = self.request.POST.get('license_image')

            if 'national_code_image' in self.request.FILES:
                national_code_image=Teacher_uploaded(self.request.FILES['national_code_image'])
            else:
                national_code_image = self.request.POST.get('national_code_image')
            savabegh = self.request.POST.get('savabegh')
            field1 = self.request.POST.get('state')
            field2 = self.request.POST.get('post_code')
            field3 = self.request.POST.get('job_address')
            pri = Teacher()
            pri.image = image
            pri.stute1_tecch = stute1_tecch
            pri.field1 = field1
            pri.field2 = field2
            pri.field3 = field3
            pri.field_study = field_study
            pri.uni = uni
            pri.static_phone = static_phone
            pri.degree_education_image = degree_education_image
            pri.honors = honors
            pri.tutoring = tutoring
            pri.lesson = lesson
            pri.type_teach = type_teach
            pri.software = software
            pri.price_meeting = price_meeting
            pri.place = place
            pri.sex_student = sex_student
            pri.count_meeting = count_meeting
            pri.sample_video = sample_video
            pri.other = other
            pri.user_id = user_id
            pri.city = city
            pri.degree_eductions = degree_eductions
            pri.addres = addres
            pri.sex = sex
            pri.email = email
            pri.image_savabgh=image_savabgh
            pri.teach_level=teach_level
            pri.national_code = national_code
            pri.data_birth = data_birth
            pri.point = point
            pri.about = about
            pri.url = url
            pri.cart_number = cart_number
            pri.license_image = license_image
            pri.national_code_image = national_code_image
            pri.savabegh = savabegh


            pri.save()
           
            return Response({'success': True, 'id': str(pri.id)})
        except Exception as e:
            return Response({'success': False, 'message': str(e)})


class EditTeacher(APIView):
    def post(self, request, format=None):

        try:
            keyword = Teacher.objects.filter(id=self.request.POST.get('id'))
            if self.request.POST.get('image'):
                keyword.update(
                    image=self.request.POST.get('image'),
                    image_savabgh=self.request.POST.get('image_savabgh'),
                    teach_level=self.request.POST.get('teach_level'),
                    stute1_tecch=self.request.POST.get('stute1_tecch'),
                    field_study=self.request.POST.get('field_study'),
                    uni=self.request.POST.get('uni'),
                    static_phone=self.request.POST.get('static_phone'),
                    degree_education_image=self.request.FILES['degree_education_image'],
                    honors=self.request.POST.get('honors'),
                    tutoring=self.request.POST.get('tutoring'),
                    lesson=self.request.POST.get('lesson'),
                    type_teach=self.request.POST.get('type_teach'),
                    software=self.request.POST.get('software'),
                    price_meeting=self.request.POST.get('price_meeting'),
                    place=self.request.POST.get('place'),
                    sex_student=self.request.POST.get('sex_student'),
                    count_meeting=self.request.POST.get('count_meeting'),
                    sample_video=self.request.FILES['sample_video'],
                    other=self.request.POST.get('other'),
                    user_id=self.request.POST.get('user_id'),
                    city=self.request.POST.get('city'),
                    degree_eductions=self.request.POST.get('degree_eductions'),
                    addres=self.request.POST.get('addres'),
                    sex=self.request.POST.get('sex'),
                    email=self.request.POST.get('email'),
                    national_code=self.request.POST.get('national_code'),
                    data_birth=self.request.POST.get('data_birth'),
                    point=self.request.POST.get('point'),
                    about=self.request.POST.get('about'),
                    url=self.request.POST.get('url'),
                    cart_number=self.request.POST.get('cart_number'),
                    license_image=self.request.FILES['license_image'],
                    national_code_image=self.request.FILES['national_code_image'],
                    savabegh=self.request.POST.get('savabegh'),
                    field1 = self.request.POST.get('state'),
                    field2 = self.request.POST.get('post_code'),
                    field3 = self.request.POST.get('job_address'),

                )

            else:
                if 'image' in self.request.FILES :
                    image = self.request.FILES['image']
                else:
                    image ="NONE"
                if 'image_savabgh' in self.request.FILES :
                    image_savabgh = self.request.FILES['image_savabgh']
                else:
                    image_savabgh = "NONE"
                if 'degree_education_image' in self.request.FILES :
                    degree_education_image = self.request.FILES['degree_education_image']
                else:
                    degree_education_image = "NONE"
                if 'sample_video' in self.request.FILES :
                    sample_video = self.request.FILES['sample_video']
                else:
                    sample_video = "NONE"
                if 'license_image' in self.request.FILES :
                    license_image = self.request.FILES['license_image']
                else:
                    license_image = "NONE"
                if 'national_code_image' in self.request.FILES :
                    national_code_image = self.request.FILES['national_code_image']
                else:
                    national_code_image = "NONE"
                keyword.update(
                    image=Teacher_uploaded_file(image),
                    stute1_tecch=self.request.POST.get('stute1_tecch'),
                    field_study=self.request.POST.get('field_study'),
                    image_savabgh=Teacher_uploaded_file(image_savabgh),
                    teach_level=self.request.POST.get('teach_level'),
                    uni=self.request.POST.get('uni'),
                    static_phone=self.request.POST.get('static_phone'),
                    degree_education_image=Teacher_uploaded_file(degree_education_image),
                    honors=self.request.POST.get('honors'),
                    tutoring=self.request.POST.get('tutoring'),
                    lesson=self.request.POST.get('lesson'),
                    type_teach=self.request.POST.get('type_teach'),
                    software=self.request.POST.get('software'),
                    price_meeting=self.request.POST.get('price_meeting'),
                    place=self.request.POST.get('place'),
                    sex_student=self.request.POST.get('sex_student'),
                    count_meeting=self.request.POST.get('count_meeting'),
                    sample_video=Video_uploaded_file(sample_video),
                    other=self.request.POST.get('other'),
                    user_id=self.request.POST.get('user_id'),
                    city=self.request.POST.get('city'),
                    degree_eductions=self.request.POST.get('degree_eductions'),
                    addres=self.request.POST.get('addres'),
                    sex=self.request.POST.get('sex'),
                    email=self.request.POST.get('email'),
                    national_code=self.request.POST.get('national_code'),
                    data_birth=self.request.POST.get('data_birth'),
                    point=self.request.POST.get('point'),
                    about=self.request.POST.get('about'),
                    url=self.request.POST.get('url'),
                    cart_number=self.request.POST.get('cart_number'),
                    license_image=Teacher_uploaded_file(license_image),
                    national_code_image=Teacher_uploaded_file(national_code_image),
                    savabegh=self.request.POST.get('savabegh'),
                    field1 = self.request.POST.get('state'),
                    field2 = self.request.POST.get('post_code'),
                    field3 = self.request.POST.get('job_address'),

                )

            return Response({'success': True})
        except Exception as e:
            return Response({'success': False, 'message': str(e)})

class DeleteTeacher(APIView):
    def post(self, request, format=None):
        try:
            keyword = Teacher.objects.filter(id=self.request.POST.get('id'))
            keyword.delete()
            return Response({'success': True})
        except Exception as e:
            return Response({'success': False, 'message': e})






def handle_uploaded_file(f):
    name = str(datetime.now()).replace(':', '')
    url = str(name.replace(' ', '')) + '.png'
    destination = open('media/' + url, 'wb+')
    for chunk in f.chunks():
        destination.write(chunk)
    destination.close()
    return url
    
    


def Student_uploaded_file(f):
    name = str(datetime.now()).replace(':', '')
    url = str(name.replace(' ', ''))+ '.png'
    destination = open('media/Student/' + url, 'wb+')
    for chunk in f.chunks():
        destination.write(chunk)
    destination.close()
    return 'Student/'+url
    

def School_uploaded_file(f):
    name = str(datetime.now()).replace(':', '')
    url = str(name.replace(' ', ''))+ '.png'
    destination = open('media/School/' + url, 'wb+')
    for chunk in f.chunks():
        destination.write(chunk)
    destination.close()
    return 'School/'+url
    
    
def Teacher_uploaded(f):
    if f != 'NONE':
        name = str(datetime.now()).replace(':', '')
        url = str(name.replace(' ', ''))+ '.png'
        destination = open('media/Teacher/' + url, 'wb+')
        for chunk in f.chunks():
            destination.write(chunk)
        destination.close()
        return 'Teacher/'+url 
    else:
        return 'a'
    
    
def Teacher_uploaded_file(f):
    if f != 'NONE':
        name = str(datetime.now()).replace(':', '')
        url = str(name.replace(' ', ''))+ '.png'
        destination = open('media/Teacher/' + url, 'wb+')
        for chunk in f.chunks():
            destination.write(chunk)
        destination.close()
        return 'Teacher/'+url
    else:
        return ''
    
def Video_uploaded_file(f):
    if f != 'NONE':
        name = str(datetime.now()).replace(':', '')
        url = str(name.replace(' ', '')) + '.mp4'
        destination = open('media/Teacher' + url, 'wb+')
        for chunk in f.chunks():
            destination.write(chunk)
        destination.close()
        return 'Teacher/'+url
    else:
        return 'a'
    
def checkField(field):
    if field == None:
        return ''
    else:
        return field