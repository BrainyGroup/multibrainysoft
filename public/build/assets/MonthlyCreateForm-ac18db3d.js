import{r as b,T as k,o,g as a,a as r,t as n,e as m,v as f,u as s,F as y,h as p,b as h,w as g,k as x,l as w,j as S,f as B}from"./app-d0964fae.js";import{P as V}from"./PrimaryButton-1b1765c1.js";import"./_plugin-vue_export-helper-c27b6911.js";const M={class:"text-lg font-medium text-gray-900"},N=["onSubmit"],C=["error"],F=["value"],P=["error"],T=["value"],j={class:"flex items-center gap-4"},q={key:0,class:"text-sm text-gray-600"},U={__name:"MonthlyCreateForm",props:{translations:Object,years:Array,months:Array},setup(c){const v=c;b(null);const e=k({month:"",year:""}),_=()=>{e.get(route("reports.monthly_summary"),{preserveScroll:!0,onSuccess:()=>e.reset(),onError:()=>{e.errors.id&&nameInput.value.focus()}})},l=(u,i)=>v.translations[u]||u;return(u,i)=>(o(),a("section",null,[r("header",null,[r("h2",M,n(l("create"))+" "+n(l("paye")),1)]),r("form",{onSubmit:w(_,["prevent"]),class:"mt-6 space-y-6"},[r("div",null,[m(r("select",{"onUpdate:modelValue":i[0]||(i[0]=t=>s(e).year=t),error:s(e).errors.year,class:"mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm",label:"Bank",required:""},[(o(!0),a(y,null,p(c.years,(t,d)=>(o(),a("option",{key:d,value:t},n(t),9,F))),128))],8,C),[[f,s(e).year]])]),r("div",null,[m(r("select",{"onUpdate:modelValue":i[1]||(i[1]=t=>s(e).month=t),error:s(e).errors.month,class:"mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm",label:"Bank",required:""},[(o(!0),a(y,null,p(c.months,(t,d)=>(o(),a("option",{key:d,value:t.month},n(t.month),9,T))),128))],8,P),[[f,s(e).month]])]),r("div",j,[h(V,{disabled:s(e).processing},{default:g(()=>[S(n(l("save")),1)]),_:1},8,["disabled"]),h(x,{"enter-active-class":"transition ease-in-out","enter-from-class":"opacity-0","leave-active-class":"transition ease-in-out","leave-to-class":"opacity-0"},{default:g(()=>[s(e).recentlySuccessful?(o(),a("p",q,n(l("save"))+".",1)):B("",!0)]),_:1})])],40,N)]))}};export{U as default};
