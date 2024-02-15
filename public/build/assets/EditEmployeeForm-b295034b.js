import{r as x,T as $,o as u,g as d,a as s,t as m,b as l,u as a,e as f,v as y,F as b,h as g,w as k,k as U,l as h,j as S,f as q}from"./app-d0964fae.js";import{_ as i,a as p,b as _}from"./TextInput-2b094f06.js";import{P as B}from"./PrimaryButton-1b1765c1.js";import"./_plugin-vue_export-helper-c27b6911.js";const j={class:"text-lg font-medium text-gray-900"},A=["onSubmit"],E={class:"col-span-6 sm:col-span-4"},O={class:"col-span-6 sm:col-span-4"},N=["error"],T=["value"],D={class:"col-span-6 sm:col-span-4"},F=["error"],P=["value"],C=["error"],M=["value"],I=["error"],L=["value"],z={class:"flex items-center gap-4"},G={key:0,class:"text-sm text-gray-600"},R={__name:"EditEmployeeForm",props:{user:Object,employee:Object,salary:Object,centers:Array,centers:Array,departments:Array,scales:Object,designations:Array,banks:Array,statutories:Array,translations:Object},setup(c){const r=c,V=x(null),n=(v,o)=>r.translations[v]||v,t=$({_method:"PUT",emplyee_id:r.employee.id,full_name:r.user.first_name+" "+r.user.last_name,start_date:r.employee.start_date,salary_amount:r.salary.amount,center_id:r.employee.center_id,account_number:r.employee.account_number,tin:r.employee.tin,bank_id:r.employee.bank_id,designation_id:r.employee.designation_id,department_id:r.employee.department_id}),w=()=>{t.post(route("employees.update",r.employee.id),{preserveScroll:!0,onSuccess:()=>t.reset(),onError:()=>{t.errors.name&&(console.log("error"),V.value.focus())}})};return(v,o)=>(u(),d("section",null,[s("header",null,[s("h2",j,m(n("edit"))+" "+m(n("employee")),1)]),s("form",{onSubmit:h(w,["prevent"]),class:"mt-6 space-y-6"},[s("div",null,[l(i,{for:"full_name",value:`${n("full name")}`},null,8,["value"]),l(p,{id:"full_name",modelValue:a(t).full_name,"onUpdate:modelValue":o[0]||(o[0]=e=>a(t).full_name=e),type:"text",class:"mt-1 block w-full",disabled:""},null,8,["modelValue"]),l(_,{class:"mt-2",message:a(t).errors.full_name},null,8,["message"])]),s("div",null,[l(i,{for:"tin",value:`${n("tin")}`},null,8,["value"]),l(p,{id:"tin",modelValue:a(t).tin,"onUpdate:modelValue":o[1]||(o[1]=e=>a(t).tin=e),type:"text",class:"mt-1 block w-full",required:"",autofocus:"",autocomplete:"tin"},null,8,["modelValue"]),l(_,{class:"mt-2",message:a(t).errors.tin},null,8,["message"])]),s("div",E,[l(i,{for:"start_date",value:`${n("start date")}`},null,8,["value"]),l(p,{id:"start_date",modelValue:a(t).start_date,"onUpdate:modelValue":o[2]||(o[2]=e=>a(t).start_date=e),type:"date",class:"mt-1 block w-full",required:"",autocomplete:"start_date"},null,8,["modelValue"]),l(_,{class:"mt-2",message:a(t).errors.start_date},null,8,["message"])]),s("div",O,[l(i,{for:"salary_amount",value:`${n("salary amount")}`},null,8,["value"]),l(p,{id:"salary_amount",modelValue:a(t).salary_amount,"onUpdate:modelValue":o[3]||(o[3]=e=>a(t).salary_amount=e),type:"number",class:"mt-1 block w-full",required:"",autocomplete:"salary_amount"},null,8,["modelValue"]),l(_,{class:"mt-2",message:a(t).errors.salary_amount},null,8,["message"])]),s("div",null,[l(i,{for:"bank",value:`${n("bank")}`},null,8,["value"]),f(s("select",{"onUpdate:modelValue":o[4]||(o[4]=e=>a(t).bank_id=e),error:a(t).errors.bank_id,class:"mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm",label:"Bank",required:""},[(u(!0),d(b,null,g(c.banks,e=>(u(),d("option",{key:e.id,value:e.id},m(e.name),9,T))),128))],8,N),[[y,a(t).bank_id]])]),s("div",D,[l(i,{for:"account_number",value:`${n("account number")}`},null,8,["value"]),l(p,{id:"account_number",modelValue:a(t).account_number,"onUpdate:modelValue":o[5]||(o[5]=e=>a(t).account_number=e),type:"text",class:"mt-1 block w-full",required:"",autocomplete:"account_number"},null,8,["modelValue"]),l(_,{class:"mt-2",message:a(t).errors.account_number},null,8,["message"])]),s("div",null,[l(i,{for:"department",value:`${n("department")}`},null,8,["value"]),f(s("select",{"onUpdate:modelValue":o[6]||(o[6]=e=>a(t).department_id=e),error:a(t).errors.department_id,class:"mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm",label:"Department",required:""},[(u(!0),d(b,null,g(c.departments,e=>(u(),d("option",{key:e.id,value:e.id},m(e.name),9,P))),128))],8,F),[[y,a(t).department_id]])]),s("div",null,[l(i,{for:"designation",value:`${n("designation")}`},null,8,["value"]),f(s("select",{"onUpdate:modelValue":o[7]||(o[7]=e=>a(t).designation_id=e),error:a(t).errors.designation_id,class:"mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm",label:"Bank",required:""},[(u(!0),d(b,null,g(c.designations,e=>(u(),d("option",{key:e.id,value:e.id},m(e.name),9,M))),128))],8,C),[[y,a(t).designation_id]])]),s("div",null,[l(i,{for:"center",value:`${n("center")}`},null,8,["value"]),f(s("select",{"onUpdate:modelValue":o[8]||(o[8]=e=>a(t).center_id=e),error:a(t).errors.center_id,class:"mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm",label:"Bank",required:""},[(u(!0),d(b,null,g(c.centers,e=>(u(),d("option",{key:e.id,value:e.id},m(e.name),9,L))),128))],8,I),[[y,a(t).center_id]])]),s("div",z,[l(B,{disabled:a(t).processing},{default:k(()=>[S("Save")]),_:1},8,["disabled"]),l(U,{"enter-active-class":"transition ease-in-out","enter-from-class":"opacity-0","leave-active-class":"transition ease-in-out","leave-to-class":"opacity-0"},{default:k(()=>[a(t).recentlySuccessful?(u(),d("p",G,"Saved.")):q("",!0)]),_:1})])],40,A)]))}};export{R as default};
