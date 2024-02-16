import{r as h,T as w,o as n,g as i,a as o,t as d,b as r,u as t,e as m,v as p,F as f,h as v,w as _,k,l as S,j as $,f as B}from"./app-2c7d1a44.js";import{_ as g,a as y,b}from"./TextInput-c5171d56.js";import{P as N}from"./PrimaryButton-e0cb1bc2.js";import"./_plugin-vue_export-helper-c27b6911.js";const U={class:"text-lg font-medium text-gray-900"},C=["onSubmit"],D=["error"],F=["value"],I=["error"],L=["value"],T={class:"col-span-6 sm:col-span-4"},j={class:"flex items-center gap-4"},q={key:0,class:"text-sm text-gray-600"},O={__name:"CreateForm",props:{translations:Object,levels:Array,scales:Array},setup(c){const V=c;h(null);const e=w({name:"",description:"",level_id:"",scale_id:""}),x=()=>{e.post(route("designations.store"),{preserveScroll:!0,onSuccess:()=>e.reset(),onError:()=>{e.errors.id&&nameInput.value.focus()}})},l=(u,a)=>V.translations[u]||u;return(u,a)=>(n(),i("section",null,[o("header",null,[o("h2",U,d(l("create"))+" "+d(l("designation")),1)]),o("form",{onSubmit:S(x,["prevent"]),class:"mt-6 space-y-6"},[o("div",null,[r(g,{for:"name",value:`${l("name")}`},null,8,["value"]),r(y,{id:"name",ref:"nameInput",modelValue:t(e).name,"onUpdate:modelValue":a[0]||(a[0]=s=>t(e).name=s),type:"text",class:"mt-1 block w-full",autocomplete:"name"},null,8,["modelValue"]),r(b,{message:t(e).errors.name,class:"mt-2"},null,8,["message"])]),o("div",null,[m(o("select",{"onUpdate:modelValue":a[1]||(a[1]=s=>t(e).level_id=s),error:t(e).errors.level_id,class:"mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm",label:"Level",required:""},[(n(!0),i(f,null,v(c.levels,s=>(n(),i("option",{key:s.id,value:s.id},d(s.name),9,F))),128))],8,D),[[p,t(e).level_id]])]),o("div",null,[m(o("select",{"onUpdate:modelValue":a[2]||(a[2]=s=>t(e).scale_id=s),error:t(e).errors.scale_id,class:"mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm",label:"Level",required:""},[(n(!0),i(f,null,v(c.scales,s=>(n(),i("option",{key:s.id,value:s.id},d(s.name),9,L))),128))],8,I),[[p,t(e).scale_id]])]),o("div",T,[r(g,{for:"description",value:`${l("description")}`},null,8,["value"]),r(y,{id:"description",ref:"descriptionInput",modelValue:t(e).description,"onUpdate:modelValue":a[3]||(a[3]=s=>t(e).description=s),type:"text",class:"mt-1 block w-full",autocomplete:"description"},null,8,["modelValue"]),r(b,{message:t(e).errors.description,class:"mt-2"},null,8,["message"])]),o("div",j,[r(N,{disabled:t(e).processing},{default:_(()=>[$(d(l("save")),1)]),_:1},8,["disabled"]),r(k,{"enter-active-class":"transition ease-in-out","enter-from-class":"opacity-0","leave-active-class":"transition ease-in-out","leave-to-class":"opacity-0"},{default:_(()=>[t(e).recentlySuccessful?(n(),i("p",q,d(l("save"))+".",1)):B("",!0)]),_:1})])],40,C)]))}};export{O as default};
