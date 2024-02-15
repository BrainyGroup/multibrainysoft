import{r as g,T as x,o as m,g as u,a as o,t as l,b as s,u as t,w as d,k as V,l as h,j as S,f as k}from"./app-d0964fae.js";import{_ as p,a as f,b as _}from"./TextInput-2b094f06.js";import{P as w}from"./PrimaryButton-1b1765c1.js";import"./_plugin-vue_export-helper-c27b6911.js";const $={class:"text-lg font-medium text-gray-900"},B=["onSubmit"],N={class:"flex items-center gap-4"},P={key:0,class:"text-sm text-gray-600"},U={__name:"EditForm",props:{pay_base:Object,translations:Object},setup(b){const r=b,y=g(null),a=(i,n)=>r.translations[i]||i,e=x({_method:"PUT",name:r.pay_base.name,description:r.pay_base.description}),v=()=>{e.post(route("pay_bases.update",r.pay_base.id),{preserveScroll:!0,onSuccess:()=>e.reset(),onError:()=>{e.errors.id&&y.value.focus()}})};return(i,n)=>(m(),u("section",null,[o("header",null,[o("h2",$,l(a("edit"))+" "+l(a("pay base")),1)]),o("form",{onSubmit:h(v,["prevent"]),class:"mt-6 space-y-6"},[o("div",null,[s(p,{for:"name",value:`${a("name")}`},null,8,["value"]),s(f,{id:"name",ref:"nameInput",modelValue:t(e).name,"onUpdate:modelValue":n[0]||(n[0]=c=>t(e).name=c),type:"text",class:"mt-1 block w-full",autocomplete:"name"},null,8,["modelValue"]),s(_,{message:t(e).errors.name,class:"mt-2"},null,8,["message"])]),o("div",null,[s(p,{for:"description",value:`${a("description")}`},null,8,["value"]),s(f,{id:"description",ref:"descriptionInput",modelValue:t(e).description,"onUpdate:modelValue":n[1]||(n[1]=c=>t(e).description=c),type:"text",class:"mt-1 block w-full",autocomplete:"description"},null,8,["modelValue"]),s(_,{message:t(e).errors.description,class:"mt-2"},null,8,["message"])]),o("div",N,[s(w,{disabled:t(e).processing},{default:d(()=>[S(l(a("save")),1)]),_:1},8,["disabled"]),s(V,{"enter-active-class":"transition ease-in-out","enter-from-class":"opacity-0","leave-active-class":"transition ease-in-out","leave-to-class":"opacity-0"},{default:d(()=>[t(e).recentlySuccessful?(m(),u("p",P,l(a("saved"))+".",1)):k("",!0)]),_:1})])],40,B)]))}};export{U as default};
