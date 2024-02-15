import{r as b,T as y,o as m,g as u,a as l,t as r,b as t,u as s,w as d,k as V,l as h,j as S,f as k}from"./app-d0964fae.js";import{_ as p,a as f,b as v}from"./TextInput-2b094f06.js";import{P as w}from"./PrimaryButton-1b1765c1.js";import"./_plugin-vue_export-helper-c27b6911.js";const $={class:"text-lg font-medium text-gray-900"},B=["onSubmit"],N={class:"flex items-center gap-4"},T={key:0,class:"text-sm text-gray-600"},U={__name:"EditForm",props:{level:Object,translations:Object},setup(_){const n=_,g=b(null),a=(i,o)=>n.translations[i]||i,e=y({_method:"PUT",name:n.level.name,description:n.level.description}),x=()=>{e.post(route("levels.update",n.level.id),{preserveScroll:!0,onSuccess:()=>e.reset(),onError:()=>{e.errors.id&&g.value.focus()}})};return(i,o)=>(m(),u("section",null,[l("header",null,[l("h2",$,r(a("edit"))+" "+r(a("level")),1)]),l("form",{onSubmit:h(x,["prevent"]),class:"mt-6 space-y-6"},[l("div",null,[t(p,{for:"name",value:`${a("name")}`},null,8,["value"]),t(f,{id:"name",ref:"nameInput",modelValue:s(e).name,"onUpdate:modelValue":o[0]||(o[0]=c=>s(e).name=c),type:"text",class:"mt-1 block w-full",autocomplete:"name"},null,8,["modelValue"]),t(v,{message:s(e).errors.name,class:"mt-2"},null,8,["message"])]),l("div",null,[t(p,{for:"description",value:`${a("description")}`},null,8,["value"]),t(f,{id:"description",ref:"descriptionInput",modelValue:s(e).description,"onUpdate:modelValue":o[1]||(o[1]=c=>s(e).description=c),type:"text",class:"mt-1 block w-full",autocomplete:"description"},null,8,["modelValue"]),t(v,{message:s(e).errors.description,class:"mt-2"},null,8,["message"])]),l("div",N,[t(w,{disabled:s(e).processing},{default:d(()=>[S(r(a("save")),1)]),_:1},8,["disabled"]),t(V,{"enter-active-class":"transition ease-in-out","enter-from-class":"opacity-0","leave-active-class":"transition ease-in-out","leave-to-class":"opacity-0"},{default:d(()=>[s(e).recentlySuccessful?(m(),u("p",T,r(a("saved"))+".",1)):k("",!0)]),_:1})])],40,B)]))}};export{U as default};
