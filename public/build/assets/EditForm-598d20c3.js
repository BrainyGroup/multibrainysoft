import{r as x,T as b,o as d,g as u,a as o,t as i,b as t,u as s,w as m,k as V,l as h,j as S,f as k}from"./app-d0964fae.js";import{_ as p,a as f,b as _}from"./TextInput-2b094f06.js";import{P as w}from"./PrimaryButton-1b1765c1.js";import"./_plugin-vue_export-helper-c27b6911.js";const $={class:"text-lg font-medium text-gray-900"},B=["onSubmit"],N={class:"flex items-center gap-4"},T={key:0,class:"text-sm text-gray-600"},U={__name:"EditForm",props:{deduction_type:Object,translations:Object},setup(y){const r=y,v=x(null),a=(l,n)=>r.translations[l]||l,e=b({_method:"PUT",name:r.deduction_type.name,description:r.deduction_type.description}),g=()=>{e.post(route("deduction_types.update",r.deduction_type.id),{preserveScroll:!0,onSuccess:()=>e.reset(),onError:()=>{e.errors.id&&v.value.focus()}})};return(l,n)=>(d(),u("section",null,[o("header",null,[o("h2",$,i(a("edit"))+" "+i(a("deduction type")),1)]),o("form",{onSubmit:h(g,["prevent"]),class:"mt-6 space-y-6"},[o("div",null,[t(p,{for:"name",value:`${a("name")}`},null,8,["value"]),t(f,{id:"name",ref:"nameInput",modelValue:s(e).name,"onUpdate:modelValue":n[0]||(n[0]=c=>s(e).name=c),type:"text",class:"mt-1 block w-full",autocomplete:"name"},null,8,["modelValue"]),t(_,{message:s(e).errors.name,class:"mt-2"},null,8,["message"])]),o("div",null,[t(p,{for:"description",value:`${a("description")}`},null,8,["value"]),t(f,{id:"description",ref:"descriptionInput",modelValue:s(e).description,"onUpdate:modelValue":n[1]||(n[1]=c=>s(e).description=c),type:"text",class:"mt-1 block w-full",autocomplete:"description"},null,8,["modelValue"]),t(_,{message:s(e).errors.description,class:"mt-2"},null,8,["message"])]),o("div",N,[t(w,{disabled:s(e).processing},{default:m(()=>[S(i(a("save")),1)]),_:1},8,["disabled"]),t(V,{"enter-active-class":"transition ease-in-out","enter-from-class":"opacity-0","leave-active-class":"transition ease-in-out","leave-to-class":"opacity-0"},{default:m(()=>[s(e).recentlySuccessful?(d(),u("p",T,i(a("saved"))+".",1)):k("",!0)]),_:1})])],40,B)]))}};export{U as default};
