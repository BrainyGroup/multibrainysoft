import{T as c,o as f,c as w,w as n,b as o,u as s,Z as _,a as r,j as d,i as g,n as V,l as b}from"./app-2c7d1a44.js";import{_ as v}from"./GuestLayout-447f80f5.js";import{_ as t,a as m,b as i}from"./TextInput-c5171d56.js";import{P as y}from"./PrimaryButton-e0cb1bc2.js";import"./ApplicationLogo-ddd2dcec.js";import"./_plugin-vue_export-helper-c27b6911.js";const x=["onSubmit"],k={class:"mt-4"},h={class:"mt-4"},q={class:"mt-4"},B={class:"flex items-center justify-end mt-4"},S={__name:"Register",setup(N){const e=c({name:"",email:"",password:"",password_confirmation:""}),u=()=>{e.post(route("register"),{onFinish:()=>e.reset("password","password_confirmation")})};return(p,a)=>(f(),w(v,null,{default:n(()=>[o(s(_),{title:"Register"}),r("form",{onSubmit:b(u,["prevent"])},[r("div",null,[o(t,{for:"name",value:"Name"}),o(m,{id:"name",type:"text",class:"mt-1 block w-full",modelValue:s(e).name,"onUpdate:modelValue":a[0]||(a[0]=l=>s(e).name=l),required:"",autofocus:"",autocomplete:"name"},null,8,["modelValue"]),o(i,{class:"mt-2",message:s(e).errors.name},null,8,["message"])]),r("div",k,[o(t,{for:"email",value:"Email"}),o(m,{id:"email",type:"email",class:"mt-1 block w-full",modelValue:s(e).email,"onUpdate:modelValue":a[1]||(a[1]=l=>s(e).email=l),required:"",autocomplete:"username"},null,8,["modelValue"]),o(i,{class:"mt-2",message:s(e).errors.email},null,8,["message"])]),r("div",h,[o(t,{for:"password",value:"Password"}),o(m,{id:"password",type:"password",class:"mt-1 block w-full",modelValue:s(e).password,"onUpdate:modelValue":a[2]||(a[2]=l=>s(e).password=l),required:"",autocomplete:"new-password"},null,8,["modelValue"]),o(i,{class:"mt-2",message:s(e).errors.password},null,8,["message"])]),r("div",q,[o(t,{for:"password_confirmation",value:"Confirm Password"}),o(m,{id:"password_confirmation",type:"password",class:"mt-1 block w-full",modelValue:s(e).password_confirmation,"onUpdate:modelValue":a[3]||(a[3]=l=>s(e).password_confirmation=l),required:"",autocomplete:"new-password"},null,8,["modelValue"]),o(i,{class:"mt-2",message:s(e).errors.password_confirmation},null,8,["message"])]),r("div",B,[o(s(g),{href:p.route("login"),class:"underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"},{default:n(()=>[d(" Already registered? ")]),_:1},8,["href"]),o(y,{class:V(["ml-4",{"opacity-25":s(e).processing}]),disabled:s(e).processing},{default:n(()=>[d(" Register ")]),_:1},8,["class","disabled"])])],40,x)]),_:1}))}};export{S as default};
