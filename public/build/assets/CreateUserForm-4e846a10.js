import{r as w,T as x,o as u,g as c,a as t,t as d,b as s,u as l,e as y,v as k,F as $,h as U,w as _,k as S,l as z,j as h,f as q}from"./app-ec8b9ce4.js";import{_ as i,a as m,b as r}from"./TextInput-e66e4902.js";import{P as B}from"./PrimaryButton-b3d0a216.js";import{_ as F}from"./Checkbox-4fba078f.js";import"./_plugin-vue_export-helper-c27b6911.js";const I={class:"text-lg font-medium text-gray-900"},N=["onSubmit"],C={class:"col-span-6 sm:col-span-4"},M={class:"col-span-6 sm:col-span-4"},T={class:"col-span-6 sm:col-span-4"},j={class:"col-span-6 sm:col-span-4"},D={class:"col-span-6 sm:col-span-4"},E={class:"col-span-6 sm:col-span-4"},P={class:"col-span-6 sm:col-span-4"},A=["error"],G={value:"Male"},L={value:"Female"},O={class:"col-span-6 sm:col-span-4"},H={class:"col-span-6 sm:col-span-4"},J={class:"col-span-6 sm:col-span-4"},K={class:"col-span-6 sm:col-span-4"},Q={class:"col-span-6 sm:col-span-4"},R={class:"col-span-6 sm:col-span-4"},W={class:"flex items-center"},X={class:"ml-2 text-sm text-gray-600"},Y={class:"flex items-center gap-4"},Z={key:0,class:"text-sm text-gray-600"},te={__name:"CreateUserForm",props:{roles:Array,translations:Object},setup(f){const v=f,g=w(null),n=(p,o)=>v.translations[p]||p,e=x({name:"",email:"",password:"",password_confirmation:"",national_id:"",terms:!0,sex:"",marital_status:"",title:"",first_name:"",middle_name:"",last_name:"",initials:"",designation:"",organization_id:"",photo_path:"",dob:"",mobile:"",storage_limit:"0",pa_email:"",send_welcome_email:!1,send_start_guide:!1,roleIds:[],created_by:1}),V=()=>{e.post(route("users.store"),{preserveScroll:!0,onSuccess:()=>e.reset(),onError:()=>{e.errors.name&&(console.log("error"),g.value.focus())}})};return(p,o)=>(u(),c("section",null,[t("header",null,[t("h2",I,d(n("create"))+" "+d(n("user")),1)]),t("form",{onSubmit:z(V,["prevent"]),class:"mt-6 space-y-6"},[t("div",null,[s(i,{for:"name",value:`${n("name")}`},null,8,["value"]),s(m,{id:"name",modelValue:l(e).name,"onUpdate:modelValue":o[0]||(o[0]=a=>l(e).name=a),type:"text",class:"mt-1 block w-full",required:"",autofocus:"",autocomplete:"name"},null,8,["modelValue"]),s(r,{class:"mt-2",message:l(e).errors.name},null,8,["message"])]),t("div",C,[s(i,{for:"email",value:`${n("email")}`},null,8,["value"]),s(m,{id:"email",modelValue:l(e).email,"onUpdate:modelValue":o[1]||(o[1]=a=>l(e).email=a),type:"email",class:"mt-1 block w-full",required:"",autocomplete:"email"},null,8,["modelValue"]),s(r,{class:"mt-2",message:l(e).errors.email},null,8,["message"])]),t("div",M,[s(i,{for:"password",value:`${n("password")}`},null,8,["value"]),s(m,{id:"password",modelValue:l(e).password,"onUpdate:modelValue":o[2]||(o[2]=a=>l(e).password=a),type:"password",class:"mt-1 block w-full",required:"",autocomplete:"new-password"},null,8,["modelValue"]),s(r,{class:"mt-2",message:l(e).errors.password},null,8,["message"])]),t("div",T,[s(i,{for:"password_confirmation",value:`${n("confirm password")}`},null,8,["value"]),s(m,{id:"password_confirmation",modelValue:l(e).password_confirmation,"onUpdate:modelValue":o[3]||(o[3]=a=>l(e).password_confirmation=a),type:"password",class:"mt-1 block w-full",required:"",autocomplete:"new-password"},null,8,["modelValue"]),s(r,{class:"mt-2",message:l(e).errors.password_confirmation},null,8,["message"])]),t("div",j,[s(i,{for:"title",value:`${n("title")}`},null,8,["value"]),s(m,{id:"title",modelValue:l(e).title,"onUpdate:modelValue":o[4]||(o[4]=a=>l(e).title=a),type:"text",class:"mt-1 block w-full",autofocus:"",autocomplete:"title"},null,8,["modelValue"]),s(r,{class:"mt-2",message:l(e).errors.title},null,8,["message"])]),t("div",D,[s(i,{for:"first_name",value:`${n("first name")}`},null,8,["value"]),s(m,{id:"first_name",modelValue:l(e).first_name,"onUpdate:modelValue":o[5]||(o[5]=a=>l(e).first_name=a),type:"text",class:"mt-1 block w-full",autofocus:"",autocomplete:"first_name"},null,8,["modelValue"]),s(r,{class:"mt-2",message:l(e).errors.first_name},null,8,["message"])]),t("div",E,[s(i,{for:"middle_name",value:`${n("middle name")}`},null,8,["value"]),s(m,{id:"middle_name",modelValue:l(e).middle_name,"onUpdate:modelValue":o[6]||(o[6]=a=>l(e).middle_name=a),type:"text",class:"mt-1 block w-full",autofocus:"",autocomplete:"middle_name"},null,8,["modelValue"]),s(r,{class:"mt-2",message:l(e).errors.middle_name},null,8,["message"])]),t("div",P,[s(i,{for:"last_name",value:`${n("last name")}`},null,8,["value"]),s(m,{id:"last_name",modelValue:l(e).last_name,"onUpdate:modelValue":o[7]||(o[7]=a=>l(e).last_name=a),type:"text",class:"mt-1 block w-full",autofocus:"",autocomplete:"last_name"},null,8,["modelValue"]),s(r,{class:"mt-2",message:l(e).errors.last_name},null,8,["message"])]),t("div",null,[s(i,{for:"sex",value:`${n("gender")}`},null,8,["value"]),y(t("select",{id:"sex","onUpdate:modelValue":o[8]||(o[8]=a=>l(e).sex=a),error:l(e).errors.sex,class:"mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm",label:"Gender",required:""},[t("option",G,d(n("male")),1),t("option",L,d(n("female")),1)],8,A),[[k,l(e).sex]])]),t("div",O,[s(i,{for:"initials",value:`${n("initials")}`},null,8,["value"]),s(m,{id:"initials",modelValue:l(e).initials,"onUpdate:modelValue":o[9]||(o[9]=a=>l(e).initials=a),type:"text",class:"mt-1 block w-full",autofocus:"",autocomplete:"initials"},null,8,["modelValue"]),s(r,{class:"mt-2",message:l(e).errors.initials},null,8,["message"])]),t("div",H,[s(i,{for:"mobile",value:`${n("mobile")}`},null,8,["value"]),s(m,{id:"mobile",modelValue:l(e).mobile,"onUpdate:modelValue":o[10]||(o[10]=a=>l(e).mobile=a),type:"text",class:"mt-1 block w-full",autofocus:"",autocomplete:"mobile"},null,8,["modelValue"]),s(r,{class:"mt-2",message:l(e).errors.mobile},null,8,["message"])]),t("div",J,[s(i,{for:"organization_id",value:`${n("organization")}`},null,8,["value"]),s(m,{id:"organization_id",modelValue:l(e).organization_id,"onUpdate:modelValue":o[11]||(o[11]=a=>l(e).organization_id=a),type:"text",class:"mt-1 block w-full",autofocus:"",autocomplete:"organization_id"},null,8,["modelValue"]),s(r,{class:"mt-2",message:l(e).errors.organization_id},null,8,["message"])]),t("div",K,[s(i,{for:"national_id",value:`${n("national id")}`},null,8,["value"]),s(m,{id:"national_id",modelValue:l(e).national_id,"onUpdate:modelValue":o[12]||(o[12]=a=>l(e).national_id=a),type:"text",class:"mt-1 block w-full",autofocus:"",autocomplete:"national_id"},null,8,["modelValue"]),s(r,{class:"mt-2",message:l(e).errors.national_id},null,8,["message"])]),t("div",Q,[s(i,{for:"dob",value:`${n("date of birth")}`},null,8,["value"]),s(m,{id:"dob",modelValue:l(e).dob,"onUpdate:modelValue":o[13]||(o[13]=a=>l(e).dob=a),type:"date",class:"mt-1 block w-full",autofocus:"",autocomplete:"dob"},null,8,["modelValue"]),s(r,{class:"mt-2",message:l(e).errors.dob},null,8,["message"])]),t("div",R,[s(i,{for:"name",value:`${n("role name")}`},null,8,["value"]),(u(!0),c($,null,U(f.roles,a=>(u(),c("div",{key:a.id,class:"col-span-6 sm:col-span-4"},[t("label",W,[s(F,{checked:l(e).roleIds,"onUpdate:checked":o[14]||(o[14]=b=>l(e).roleIds=b),id:a.id,value:a.id},null,8,["checked","id","value"]),t("span",X,d(a.name),1)])]))),128))]),t("div",Y,[s(B,{disabled:l(e).processing},{default:_(()=>[h("Save")]),_:1},8,["disabled"]),s(S,{"enter-active-class":"transition ease-in-out","enter-from-class":"opacity-0","leave-active-class":"transition ease-in-out","leave-to-class":"opacity-0"},{default:_(()=>[l(e).recentlySuccessful?(u(),c("p",Z,"Saved.")):q("",!0)]),_:1})])],40,N)]))}};export{te as default};
