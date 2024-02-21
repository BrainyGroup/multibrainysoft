import{r as x,T as b,o as c,g as p,a as o,t as r,b as t,u as s,w as u,k as V,l as h,j as S,f as k}from"./app-ec8b9ce4.js";import{_ as d,a as f,b as _}from"./TextInput-e66e4902.js";import{P as w}from"./PrimaryButton-b3d0a216.js";import"./_plugin-vue_export-helper-c27b6911.js";const $={class:"text-lg font-medium text-gray-900"},B=["onSubmit"],E={class:"flex items-center gap-4"},N={key:0,class:"text-sm text-gray-600"},U={__name:"EditForm",props:{employment_type:Object,translations:Object},setup(y){const l=y,v=x(null),a=(i,n)=>l.translations[i]||i,e=b({_method:"PUT",name:l.employment_type.name,description:l.employment_type.description}),g=()=>{e.post(route("employment_types.update",l.employment_type.id),{preserveScroll:!0,onSuccess:()=>e.reset(),onError:()=>{e.errors.id&&v.value.focus()}})};return(i,n)=>(c(),p("section",null,[o("header",null,[o("h2",$,r(a("edit"))+" "+r(a("employment type")),1)]),o("form",{onSubmit:h(g,["prevent"]),class:"mt-6 space-y-6"},[o("div",null,[t(d,{for:"name",value:`${a("name")}`},null,8,["value"]),t(f,{id:"name",ref:"nameInput",modelValue:s(e).name,"onUpdate:modelValue":n[0]||(n[0]=m=>s(e).name=m),type:"text",class:"mt-1 block w-full",autocomplete:"name"},null,8,["modelValue"]),t(_,{message:s(e).errors.name,class:"mt-2"},null,8,["message"])]),o("div",null,[t(d,{for:"description",value:`${a("description")}`},null,8,["value"]),t(f,{id:"description",ref:"descriptionInput",modelValue:s(e).description,"onUpdate:modelValue":n[1]||(n[1]=m=>s(e).description=m),type:"text",class:"mt-1 block w-full",autocomplete:"description"},null,8,["modelValue"]),t(_,{message:s(e).errors.description,class:"mt-2"},null,8,["message"])]),o("div",E,[t(w,{disabled:s(e).processing},{default:u(()=>[S(r(a("save")),1)]),_:1},8,["disabled"]),t(V,{"enter-active-class":"transition ease-in-out","enter-from-class":"opacity-0","leave-active-class":"transition ease-in-out","leave-to-class":"opacity-0"},{default:u(()=>[s(e).recentlySuccessful?(c(),p("p",N,r(a("saved"))+".",1)):k("",!0)]),_:1})])],40,B)]))}};export{U as default};
