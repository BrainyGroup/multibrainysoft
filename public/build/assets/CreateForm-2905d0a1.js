import{r as b,T as g,o as c,g as m,a as o,t as n,b as s,u as t,w as u,k as x,l as V,j as S,f as h}from"./app-2c7d1a44.js";import{_ as d,a as p,b as f}from"./TextInput-c5171d56.js";import{P as k}from"./PrimaryButton-e0cb1bc2.js";import"./_plugin-vue_export-helper-c27b6911.js";const w={class:"text-lg font-medium text-gray-900"},$=["onSubmit"],B={class:"col-span-6 sm:col-span-4"},N={class:"flex items-center gap-4"},C={key:0,class:"text-sm text-gray-600"},P={__name:"CreateForm",props:{translations:Object},setup(_){const v=_;b(null);const e=g({name:"",description:""}),y=()=>{e.post(route("salary_bases.store"),{preserveScroll:!0,onSuccess:()=>e.reset(),onError:()=>{e.errors.id&&nameInput.value.focus()}})},a=(l,r)=>v.translations[l]||l;return(l,r)=>(c(),m("section",null,[o("header",null,[o("h2",w,n(a("create"))+" "+n(a("salary base")),1)]),o("form",{onSubmit:V(y,["prevent"]),class:"mt-6 space-y-6"},[o("div",null,[s(d,{for:"name",value:`${a("name")}`},null,8,["value"]),s(p,{id:"name",ref:"nameInput",modelValue:t(e).name,"onUpdate:modelValue":r[0]||(r[0]=i=>t(e).name=i),type:"text",class:"mt-1 block w-full",autocomplete:"name"},null,8,["modelValue"]),s(f,{message:t(e).errors.name,class:"mt-2"},null,8,["message"])]),o("div",B,[s(d,{for:"description",value:`${a("description")}`},null,8,["value"]),s(p,{id:"description",ref:"descriptionInput",modelValue:t(e).description,"onUpdate:modelValue":r[1]||(r[1]=i=>t(e).description=i),type:"text",class:"mt-1 block w-full",autocomplete:"description"},null,8,["modelValue"]),s(f,{message:t(e).errors.description,class:"mt-2"},null,8,["message"])]),o("div",N,[s(k,{disabled:t(e).processing},{default:u(()=>[S(n(a("save")),1)]),_:1},8,["disabled"]),s(x,{"enter-active-class":"transition ease-in-out","enter-from-class":"opacity-0","leave-active-class":"transition ease-in-out","leave-to-class":"opacity-0"},{default:u(()=>[t(e).recentlySuccessful?(c(),m("p",C,n(a("save"))+".",1)):h("",!0)]),_:1})])],40,$)]))}};export{P as default};
