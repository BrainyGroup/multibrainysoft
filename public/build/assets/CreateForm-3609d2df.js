import{r as g,T as V,o as d,g as p,a as n,t as r,b as t,u as s,w as f,k as x,l as y,j as k,f as w}from"./app-ec8b9ce4.js";import{_ as u,a as i,b as c}from"./TextInput-e66e4902.js";import{P as S}from"./PrimaryButton-b3d0a216.js";import"./_plugin-vue_export-helper-c27b6911.js";const $={class:"text-lg font-medium text-gray-900"},B=["onSubmit"],C={class:"flex items-center gap-4"},I={key:0,class:"text-sm text-gray-600"},j={__name:"CreateForm",props:{translations:Object},setup(v){const b=v;g(null);const e=V({name:"",number:"",description:""}),_=()=>{e.post(route("centers.store"),{preserveScroll:!0,onSuccess:()=>e.reset(),onError:()=>{e.errors.id&&nameInput.value.focus()}})},a=(m,l)=>b.translations[m]||m;return(m,l)=>(d(),p("section",null,[n("header",null,[n("h2",$,r(a("create"))+" "+r(a("center")),1)]),n("form",{onSubmit:y(_,["prevent"]),class:"mt-6 space-y-6"},[n("div",null,[t(u,{for:"number",value:`${a("number")}`},null,8,["value"]),t(i,{id:"number",ref:"numberInput",modelValue:s(e).number,"onUpdate:modelValue":l[0]||(l[0]=o=>s(e).number=o),type:"text",class:"mt-1 block w-full",autocomplete:"name"},null,8,["modelValue"]),t(c,{message:s(e).errors.number,class:"mt-2"},null,8,["message"])]),n("div",null,[t(u,{for:"name",value:`${a("name")}`},null,8,["value"]),t(i,{id:"name",ref:"nameInput",modelValue:s(e).name,"onUpdate:modelValue":l[1]||(l[1]=o=>s(e).name=o),type:"text",class:"mt-1 block w-full",autocomplete:"name"},null,8,["modelValue"]),t(c,{message:s(e).errors.name,class:"mt-2"},null,8,["message"])]),n("div",null,[t(u,{for:"description",value:`${a("description")}`},null,8,["value"]),t(i,{id:"description",ref:"descriptionInput",modelValue:s(e).description,"onUpdate:modelValue":l[2]||(l[2]=o=>s(e).description=o),type:"text",class:"mt-1 block w-full",autocomplete:"description"},null,8,["modelValue"]),t(c,{message:s(e).errors.description,class:"mt-2"},null,8,["message"])]),n("div",C,[t(S,{disabled:s(e).processing},{default:f(()=>[k(r(a("save")),1)]),_:1},8,["disabled"]),t(x,{"enter-active-class":"transition ease-in-out","enter-from-class":"opacity-0","leave-active-class":"transition ease-in-out","leave-to-class":"opacity-0"},{default:f(()=>[s(e).recentlySuccessful?(d(),p("p",I,r(a("save"))+".",1)):w("",!0)]),_:1})])],40,B)]))}};export{j as default};
