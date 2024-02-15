import{r as g,T as x,o as m,g as u,a as o,t as n,b as s,u as a,w as d,k as V,l as S,j as h,f as k}from"./app-d0964fae.js";import{_ as p,a as f,b as _}from"./TextInput-2b094f06.js";import{P as w}from"./PrimaryButton-1b1765c1.js";import"./_plugin-vue_export-helper-c27b6911.js";const $={class:"text-lg font-medium text-gray-900"},B=["onSubmit"],N={class:"flex items-center gap-4"},T={key:0,class:"text-sm text-gray-600"},U={__name:"EditForm",props:{salary_base:Object,translations:Object},setup(b){const l=b,y=g(null),t=(i,r)=>l.translations[i]||i,e=x({_method:"PUT",name:l.salary_base.name,description:l.salary_base.description}),v=()=>{e.post(route("salary_bases.update",l.salary_base.id),{preserveScroll:!0,onSuccess:()=>e.reset(),onError:()=>{e.errors.id&&y.value.focus()}})};return(i,r)=>(m(),u("section",null,[o("header",null,[o("h2",$,n(t("edit"))+" "+n(t("salary base")),1)]),o("form",{onSubmit:S(v,["prevent"]),class:"mt-6 space-y-6"},[o("div",null,[s(p,{for:"name",value:`${t("name")}`},null,8,["value"]),s(f,{id:"name",ref:"nameInput",modelValue:a(e).name,"onUpdate:modelValue":r[0]||(r[0]=c=>a(e).name=c),type:"text",class:"mt-1 block w-full",autocomplete:"name"},null,8,["modelValue"]),s(_,{message:a(e).errors.name,class:"mt-2"},null,8,["message"])]),o("div",null,[s(p,{for:"description",value:`${t("description")}`},null,8,["value"]),s(f,{id:"description",ref:"descriptionInput",modelValue:a(e).description,"onUpdate:modelValue":r[1]||(r[1]=c=>a(e).description=c),type:"text",class:"mt-1 block w-full",autocomplete:"description"},null,8,["modelValue"]),s(_,{message:a(e).errors.description,class:"mt-2"},null,8,["message"])]),o("div",N,[s(w,{disabled:a(e).processing},{default:d(()=>[h(n(t("save")),1)]),_:1},8,["disabled"]),s(V,{"enter-active-class":"transition ease-in-out","enter-from-class":"opacity-0","leave-active-class":"transition ease-in-out","leave-to-class":"opacity-0"},{default:d(()=>[a(e).recentlySuccessful?(m(),u("p",T,n(t("saved"))+".",1)):k("",!0)]),_:1})])],40,B)]))}};export{U as default};
