import{r as b,T as g,o as c,g as m,a as o,t as r,b as s,u as t,w as u,k as x,l as V,j as h,f as S}from"./app-ec8b9ce4.js";import{_ as p,a as d,b as f}from"./TextInput-e66e4902.js";import{P as k}from"./PrimaryButton-b3d0a216.js";import"./_plugin-vue_export-helper-c27b6911.js";const w={class:"text-lg font-medium text-gray-900"},$=["onSubmit"],B={class:"col-span-6 sm:col-span-4"},N={class:"flex items-center gap-4"},C={key:0,class:"text-sm text-gray-600"},E={__name:"CreateForm",props:{translations:Object},setup(_){const v=_;b(null);const e=g({name:"",description:""}),y=()=>{e.post(route("pay_bases.store"),{preserveScroll:!0,onSuccess:()=>e.reset(),onError:()=>{e.errors.id&&nameInput.value.focus()}})},a=(l,n)=>v.translations[l]||l;return(l,n)=>(c(),m("section",null,[o("header",null,[o("h2",w,r(a("create"))+" "+r(a("pay base")),1)]),o("form",{onSubmit:V(y,["prevent"]),class:"mt-6 space-y-6"},[o("div",null,[s(p,{for:"name",value:`${a("name")}`},null,8,["value"]),s(d,{id:"name",ref:"nameInput",modelValue:t(e).name,"onUpdate:modelValue":n[0]||(n[0]=i=>t(e).name=i),type:"text",class:"mt-1 block w-full",autocomplete:"name"},null,8,["modelValue"]),s(f,{message:t(e).errors.name,class:"mt-2"},null,8,["message"])]),o("div",B,[s(p,{for:"description",value:`${a("description")}`},null,8,["value"]),s(d,{id:"description",ref:"descriptionInput",modelValue:t(e).description,"onUpdate:modelValue":n[1]||(n[1]=i=>t(e).description=i),type:"text",class:"mt-1 block w-full",autocomplete:"description"},null,8,["modelValue"]),s(f,{message:t(e).errors.description,class:"mt-2"},null,8,["message"])]),o("div",N,[s(k,{disabled:t(e).processing},{default:u(()=>[h(r(a("save")),1)]),_:1},8,["disabled"]),s(x,{"enter-active-class":"transition ease-in-out","enter-from-class":"opacity-0","leave-active-class":"transition ease-in-out","leave-to-class":"opacity-0"},{default:u(()=>[t(e).recentlySuccessful?(c(),m("p",C,r(a("save"))+".",1)):S("",!0)]),_:1})])],40,$)]))}};export{E as default};
