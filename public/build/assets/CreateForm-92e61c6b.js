import{r as g,T as w,o as i,g as m,a as o,t as r,b as a,e as b,v as V,u as t,F as x,h,w as v,k,l as S,j as $,f as B}from"./app-2c7d1a44.js";import{_ as c,a as p,b as f}from"./TextInput-c5171d56.js";import{P as D}from"./PrimaryButton-e0cb1bc2.js";import"./_plugin-vue_export-helper-c27b6911.js";const I={class:"text-lg font-medium text-gray-900"},N=["onSubmit"],U=["error"],j=["value"],C={class:"col-span-6 sm:col-span-4"},F={class:"col-span-6 sm:col-span-4"},T={class:"col-span-6 sm:col-span-4"},A={class:"flex items-center gap-4"},E={key:0,class:"text-sm text-gray-600"},L={__name:"CreateForm",props:{translations:Object,employee:Object,allowance_types:Array,today_date:Date,end_date:Date,last_name:String,first_name:String},setup(u){const d=u;g(null);const e=w({name:d.first_name+" "+d.last_name,employee_id:d.employee.id,amount:"",allowance_type_id:"",start_date:d.today_date,end_date:d.end_date}),y=()=>{e.post(route("allowances.store"),{preserveScroll:!0,onSuccess:()=>e.reset(),onError:()=>{e.errors.id&&nameInput.value.focus()}})},n=(_,l)=>d.translations[_]||_;return(_,l)=>(i(),m("section",null,[o("header",null,[o("h2",I,r(n("add"))+" "+r(n("allowance"))+" for "+r(u.first_name)+" "+r(u.last_name),1)]),o("form",{onSubmit:S(y,["prevent"]),class:"mt-6 space-y-6"},[o("div",null,[a(c,{for:"allowance_type_id",value:`${n("allowance type")}`},null,8,["value"]),b(o("select",{"onUpdate:modelValue":l[0]||(l[0]=s=>t(e).allowance_type_id=s),error:t(e).errors.allowance_type_id,class:"mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm",label:"Bank",required:""},[(i(!0),m(x,null,h(u.allowance_types,s=>(i(),m("option",{key:s.id,value:s.id},r(s.name),9,j))),128))],8,U),[[V,t(e).allowance_type_id]])]),o("div",C,[a(c,{for:"amount",value:`${n("amount")}`},null,8,["value"]),a(p,{id:"amount",ref:"amountInput",modelValue:t(e).amount,"onUpdate:modelValue":l[1]||(l[1]=s=>t(e).amount=s),type:"text",class:"mt-1 block w-full",autocomplete:"amount"},null,8,["modelValue"]),a(f,{message:t(e).errors.amount,class:"mt-2"},null,8,["message"])]),o("div",F,[a(c,{for:"start_date",value:`${n("start date")}`},null,8,["value"]),a(p,{id:"start_date",ref:"start_dateInput",modelValue:t(e).start_date,"onUpdate:modelValue":l[2]||(l[2]=s=>t(e).start_date=s),type:"date",class:"mt-1 block w-full",autocomplete:"start_date"},null,8,["modelValue"]),a(f,{message:t(e).errors.start_date,class:"mt-2"},null,8,["message"])]),o("div",T,[a(c,{for:"end_date",value:`${n("end date")}`},null,8,["value"]),a(p,{id:"end_date",ref:"end_dateInput",modelValue:t(e).end_date,"onUpdate:modelValue":l[3]||(l[3]=s=>t(e).end_date=s),type:"date",class:"mt-1 block w-full",autocomplete:"end_date"},null,8,["modelValue"]),a(f,{message:t(e).errors.end_date,class:"mt-2"},null,8,["message"])]),o("div",A,[a(D,{disabled:t(e).processing},{default:v(()=>[$(r(n("save")),1)]),_:1},8,["disabled"]),a(k,{"enter-active-class":"transition ease-in-out","enter-from-class":"opacity-0","leave-active-class":"transition ease-in-out","leave-to-class":"opacity-0"},{default:v(()=>[t(e).recentlySuccessful?(i(),m("p",E,r(n("save"))+".",1)):B("",!0)]),_:1})])],40,N)]))}};export{L as default};
