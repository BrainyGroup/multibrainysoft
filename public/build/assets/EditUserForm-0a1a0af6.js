import{r as w,T as y,o as c,g as p,a as t,t as d,b as l,u as s,e as x,v as k,F as $,h as U,w as v,k as h,l as z,j as S,f as j}from"./app-2c7d1a44.js";import{_ as m,a as r,b as u}from"./TextInput-c5171d56.js";import{P as B}from"./PrimaryButton-e0cb1bc2.js";import{_ as F}from"./Checkbox-293020e5.js";import"./_plugin-vue_export-helper-c27b6911.js";const I={class:"text-lg font-medium text-gray-900"},N=["onSubmit"],O={class:"col-span-6 sm:col-span-4"},T={class:"col-span-6 sm:col-span-4"},q={class:"col-span-6 sm:col-span-4"},E={class:"col-span-6 sm:col-span-4"},M={class:"col-span-6 sm:col-span-4"},P={class:"col-span-6 sm:col-span-4"},C={class:"col-span-6 sm:col-span-4"},D={class:"col-span-6 sm:col-span-4"},R=["error"],A={value:"Male"},G={value:"Female"},L={class:"col-span-6 sm:col-span-4"},H={class:"col-span-6 sm:col-span-4"},J={class:"col-span-6 sm:col-span-4"},K={class:"col-span-6 sm:col-span-4"},Q={class:"col-span-6 sm:col-span-4"},W={class:"col-span-6 sm:col-span-4"},X={class:"flex items-center"},Y={class:"ml-2 text-sm text-gray-600"},Z={class:"flex items-center gap-4"},ee={key:0,class:"text-sm text-gray-600"},ne={__name:"EditUserForm",props:{roles:Array,userRoles:Object,user:Object,translations:Object},setup(f){const n=f,g=w(null),i=(_,o)=>n.translations[_]||_,e=y({_method:"PUT",name:n.user.name,email:n.user.email,password:"",password_confirmation:"",national_id:n.user.national_id,terms:n.user.terms,gender:n.user.sex,marital_status:n.user.marital_status,title:n.user.title,first_name:n.user.first_name,middle_name:n.user.middle_name,last_name:n.user.last_name,initials:n.user.initials,photo_path:n.user.photo_path,dob:n.user.dob,organization_id:n.user.organization_id,mobile:n.user.mobile,designation:n.user.designation,storage_limit:n.user.storage_limit,pa_email:n.user.pa_email,send_welcome_email:n.user.send_welcome_email,send_start_guide:n.user.send_start_guide,roleIds:Object.values(n.userRoles)}),b=()=>{e.post(route("users.update",n.user.id),{preserveScroll:!0,onSuccess:()=>e.reset(),onError:()=>{e.errors.name&&(console.log("error"),g.value.focus())}})};return(_,o)=>(c(),p("section",null,[t("header",null,[t("h2",I,d(i("edit"))+" "+d(i("user")),1)]),t("form",{onSubmit:z(b,["prevent"]),class:"mt-6 space-y-6"},[t("div",O,[l(m,{for:"name",value:`${i("name")}`},null,8,["value"]),l(r,{id:"name",modelValue:s(e).name,"onUpdate:modelValue":o[0]||(o[0]=a=>s(e).name=a),type:"text",class:"mt-1 block w-full",required:"",autofocus:"",autocomplete:"name"},null,8,["modelValue"]),l(u,{class:"mt-2",message:s(e).errors.name},null,8,["message"])]),t("div",T,[l(m,{for:"email",value:`${i("email")}`},null,8,["value"]),l(r,{id:"email",modelValue:s(e).email,"onUpdate:modelValue":o[1]||(o[1]=a=>s(e).email=a),type:"email",class:"mt-1 block w-full",required:"",autocomplete:"email"},null,8,["modelValue"]),l(u,{class:"mt-2",message:s(e).errors.email},null,8,["message"])]),t("div",q,[l(m,{for:"password",value:`${i("password")}`},null,8,["value"]),l(r,{id:"password",modelValue:s(e).password,"onUpdate:modelValue":o[2]||(o[2]=a=>s(e).password=a),type:"password",class:"mt-1 block w-full",autocomplete:"new-password"},null,8,["modelValue"]),l(u,{class:"mt-2",message:s(e).errors.password},null,8,["message"])]),t("div",E,[l(m,{for:"password_confirmation",value:`${i("confirm password")}`},null,8,["value"]),l(r,{id:"password_confirmation",modelValue:s(e).password_confirmation,"onUpdate:modelValue":o[3]||(o[3]=a=>s(e).password_confirmation=a),type:"password",class:"mt-1 block w-full",autocomplete:"new-password"},null,8,["modelValue"]),l(u,{class:"mt-2",message:s(e).errors.password_confirmation},null,8,["message"])]),t("div",M,[l(m,{for:"title",value:`${i("title")}`},null,8,["value"]),l(r,{id:"title",modelValue:s(e).title,"onUpdate:modelValue":o[4]||(o[4]=a=>s(e).title=a),type:"text",class:"mt-1 block w-full",autofocus:"",autocomplete:"title"},null,8,["modelValue"]),l(u,{class:"mt-2",message:s(e).errors.title},null,8,["message"])]),t("div",P,[l(m,{for:"first_name",value:`${i("first name")}`},null,8,["value"]),l(r,{id:"first_name",modelValue:s(e).first_name,"onUpdate:modelValue":o[5]||(o[5]=a=>s(e).first_name=a),type:"text",class:"mt-1 block w-full",autofocus:"",autocomplete:"first_name"},null,8,["modelValue"]),l(u,{class:"mt-2",message:s(e).errors.first_name},null,8,["message"])]),t("div",C,[l(m,{for:"middle_name",value:`${i("middle name")}`},null,8,["value"]),l(r,{id:"middle_name",modelValue:s(e).middle_name,"onUpdate:modelValue":o[6]||(o[6]=a=>s(e).middle_name=a),type:"text",class:"mt-1 block w-full",autofocus:"",autocomplete:"middle_name"},null,8,["modelValue"]),l(u,{class:"mt-2",message:s(e).errors.middle_name},null,8,["message"])]),t("div",D,[l(m,{for:"last_name",value:`${i("last name")}`},null,8,["value"]),l(r,{id:"last_name",modelValue:s(e).last_name,"onUpdate:modelValue":o[7]||(o[7]=a=>s(e).last_name=a),type:"text",class:"mt-1 block w-full",autofocus:"",autocomplete:"last_name"},null,8,["modelValue"]),l(u,{class:"mt-2",message:s(e).errors.last_name},null,8,["message"])]),t("div",null,[l(m,{for:"genders",value:`${i("gender")}`},null,8,["value"]),x(t("select",{id:"sex","onUpdate:modelValue":o[8]||(o[8]=a=>s(e).gender=a),error:s(e).errors.genders,class:"mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm",label:"Gender",required:""},[t("option",A,d(i("male")),1),t("option",G,d(i("female")),1)],8,R),[[k,s(e).gender]])]),t("div",L,[l(m,{for:"initials",value:`${i("initials")}`},null,8,["value"]),l(r,{id:"initials",modelValue:s(e).initials,"onUpdate:modelValue":o[9]||(o[9]=a=>s(e).initials=a),type:"text",class:"mt-1 block w-full",autofocus:"",autocomplete:"initials"},null,8,["modelValue"]),l(u,{class:"mt-2",message:s(e).errors.initials},null,8,["message"])]),t("div",H,[l(m,{for:"mobile",value:`${i("mobile")}`},null,8,["value"]),l(r,{id:"mobile",modelValue:s(e).mobile,"onUpdate:modelValue":o[10]||(o[10]=a=>s(e).mobile=a),type:"text",class:"mt-1 block w-full",autofocus:"",autocomplete:"mobile"},null,8,["modelValue"]),l(u,{class:"mt-2",message:s(e).errors.mobile},null,8,["message"])]),t("div",J,[l(m,{for:"organization_id",value:`${i("organization")}`},null,8,["value"]),l(r,{id:"organization_id",modelValue:s(e).organization_id,"onUpdate:modelValue":o[11]||(o[11]=a=>s(e).organization_id=a),type:"text",class:"mt-1 block w-full",autofocus:"",autocomplete:"organization_id"},null,8,["modelValue"]),l(u,{class:"mt-2",message:s(e).errors.organization_id},null,8,["message"])]),t("div",K,[l(m,{for:"national_id",value:`${i("national id")}`},null,8,["value"]),l(r,{id:"national_id",modelValue:s(e).national_id,"onUpdate:modelValue":o[12]||(o[12]=a=>s(e).national_id=a),type:"text",class:"mt-1 block w-full",autofocus:"",autocomplete:"national_id"},null,8,["modelValue"]),l(u,{class:"mt-2",message:s(e).errors.national_id},null,8,["message"])]),t("div",Q,[l(m,{for:"dob",value:`${i("date of birth")}`},null,8,["value"]),l(r,{id:"dob",modelValue:s(e).dob,"onUpdate:modelValue":o[13]||(o[13]=a=>s(e).dob=a),type:"date",class:"mt-1 block w-full",autofocus:"",autocomplete:"dob"},null,8,["modelValue"]),l(u,{class:"mt-2",message:s(e).errors.dob},null,8,["message"])]),t("div",W,[l(m,{for:"name",value:`${i("role name")}`},null,8,["value"]),(c(!0),p($,null,U(f.roles,a=>(c(),p("div",{key:a.id,class:"col-span-6 sm:col-span-4"},[t("label",X,[l(F,{checked:s(e).roleIds,"onUpdate:checked":o[14]||(o[14]=V=>s(e).roleIds=V),id:a.id,value:a.id},null,8,["checked","id","value"]),t("span",Y,d(a.name),1)])]))),128))]),t("div",Z,[l(B,{disabled:s(e).processing},{default:v(()=>[S("Save")]),_:1},8,["disabled"]),l(h,{"enter-active-class":"transition ease-in-out","enter-from-class":"opacity-0","leave-active-class":"transition ease-in-out","leave-to-class":"opacity-0"},{default:v(()=>[s(e).recentlySuccessful?(c(),p("p",ee,"Saved.")):j("",!0)]),_:1})])],40,N)]))}};export{ne as default};
