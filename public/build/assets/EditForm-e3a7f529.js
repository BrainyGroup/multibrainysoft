import{r as b,T as y,o as c,g as d,a as o,t as l,b as t,u as s,w as u,k as V,l as h,j as S,f as k}from"./app-2c7d1a44.js";import{_ as p,a as f,b as _}from"./TextInput-c5171d56.js";import{P as w}from"./PrimaryButton-e0cb1bc2.js";import"./_plugin-vue_export-helper-c27b6911.js";const $={class:"text-lg font-medium text-gray-900"},B=["onSubmit"],N={class:"flex items-center gap-4"},T={key:0,class:"text-sm text-gray-600"},U={__name:"EditForm",props:{department:Object,translations:Object},setup(v){const r=v,g=b(null),a=(i,n)=>r.translations[i]||i,e=y({_method:"PUT",name:r.department.name,description:r.department.description}),x=()=>{e.post(route("departments.update",r.department.id),{preserveScroll:!0,onSuccess:()=>e.reset(),onError:()=>{e.errors.id&&g.value.focus()}})};return(i,n)=>(c(),d("section",null,[o("header",null,[o("h2",$,l(a("edit"))+" "+l(a("department")),1)]),o("form",{onSubmit:h(x,["prevent"]),class:"mt-6 space-y-6"},[o("div",null,[t(p,{for:"name",value:`${a("name")}`},null,8,["value"]),t(f,{id:"name",ref:"nameInput",modelValue:s(e).name,"onUpdate:modelValue":n[0]||(n[0]=m=>s(e).name=m),type:"text",class:"mt-1 block w-full",autocomplete:"name"},null,8,["modelValue"]),t(_,{message:s(e).errors.name,class:"mt-2"},null,8,["message"])]),o("div",null,[t(p,{for:"description",value:`${a("description")}`},null,8,["value"]),t(f,{id:"description",ref:"descriptionInput",modelValue:s(e).description,"onUpdate:modelValue":n[1]||(n[1]=m=>s(e).description=m),type:"text",class:"mt-1 block w-full",autocomplete:"description"},null,8,["modelValue"]),t(_,{message:s(e).errors.description,class:"mt-2"},null,8,["message"])]),o("div",N,[t(w,{disabled:s(e).processing},{default:u(()=>[S(l(a("save")),1)]),_:1},8,["disabled"]),t(V,{"enter-active-class":"transition ease-in-out","enter-from-class":"opacity-0","leave-active-class":"transition ease-in-out","leave-to-class":"opacity-0"},{default:u(()=>[s(e).recentlySuccessful?(c(),d("p",T,l(a("saved"))+".",1)):k("",!0)]),_:1})])],40,B)]))}};export{U as default};
