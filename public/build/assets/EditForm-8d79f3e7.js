import{r as h,T as $,o as u,g as m,a as s,t as i,b as a,u as o,e as c,v as p,F as v,h as b,w as V,k as x,l as U,j as q,f as B}from"./app-ec8b9ce4.js";import{_ as d,a as y,b as _}from"./TextInput-e66e4902.js";import{P as S}from"./PrimaryButton-b3d0a216.js";import"./_plugin-vue_export-helper-c27b6911.js";const z={class:"text-lg font-medium text-gray-900"},I=["onSubmit"],N={class:"col-span-6 sm:col-span-4"},T={class:"col-span-6 sm:col-span-4"},j=["error"],A=["value"],E=["error"],F=["value"],P=["error"],C=["value"],D=["error"],M={value:"1"},O={value:"0"},L=["error"],G={value:"1"},H={value:"0"},J=["error"],K={value:"1"},Q={value:"0"},R={class:"col-span-6 sm:col-span-4"},W={class:"col-span-6 sm:col-span-4"},X={class:"col-span-6 sm:col-span-4"},Y={class:"flex items-center gap-4"},Z={key:0,class:"text-sm text-gray-600"},re={__name:"EditForm",props:{statutory:Object,translations:Object,statutory_types:Array,organizations:Array,salary_bases:Array},setup(f){const n=f,k=h(null),l=(g,r)=>n.translations[g]||g,e=$({_method:"PUT",name:n.statutory.name,description:n.statutory.description,organization_id:n.statutory.organization_id,before_paye:n.statutory.before_paye,statutory_type_id:n.statutory.statutory_type_id,base_id:n.statutory.base_id,selection:n.statutory.selection,mandatory:n.statutory.mandatory,employee:n.statutory.employee,employer:n.statutory.employer,date_required:n.statutory.date_required}),w=()=>{e.post(route("statutories.update",n.statutory.id),{preserveScroll:!0,onSuccess:()=>e.reset(),onError:()=>{e.errors.id&&k.value.focus()}})};return(g,r)=>(u(),m("section",null,[s("header",null,[s("h2",z,i(l("edit"))+" "+i(l("statutory")),1)]),s("form",{onSubmit:U(w,["prevent"]),class:"mt-6 space-y-6"},[s("div",N,[a(d,{for:"name",value:`${l("name")}`},null,8,["value"]),a(y,{id:"name",ref:"nameInput",modelValue:o(e).name,"onUpdate:modelValue":r[0]||(r[0]=t=>o(e).name=t),type:"text",class:"mt-1 block w-full",autocomplete:"name"},null,8,["modelValue"]),a(_,{message:o(e).errors.name,class:"mt-2"},null,8,["message"])]),s("div",T,[a(d,{for:"description",value:`${l("description")}`},null,8,["value"]),a(y,{id:"description",ref:"descriptionInput",modelValue:o(e).description,"onUpdate:modelValue":r[1]||(r[1]=t=>o(e).description=t),type:"text",class:"mt-1 block w-full",autocomplete:"description"},null,8,["modelValue"]),a(_,{message:o(e).errors.description,class:"mt-2"},null,8,["message"])]),s("div",null,[a(d,{for:"organization_id",value:`${l("organization")}`},null,8,["value"]),c(s("select",{"onUpdate:modelValue":r[2]||(r[2]=t=>o(e).organization_id=t),error:o(e).errors.organization_id,class:"mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm",label:"Bank",required:""},[(u(!0),m(v,null,b(f.organizations,t=>(u(),m("option",{key:t.id,value:t.id},i(t.name),9,A))),128))],8,j),[[p,o(e).organization_id]])]),s("div",null,[a(d,{for:"base_id",value:`${l("salary base")}`},null,8,["value"]),c(s("select",{"onUpdate:modelValue":r[3]||(r[3]=t=>o(e).base_id=t),error:o(e).errors.base_id,class:"mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm",label:"Bank",required:""},[(u(!0),m(v,null,b(f.salary_bases,t=>(u(),m("option",{key:t.id,value:t.id},i(t.name),9,F))),128))],8,E),[[p,o(e).base_id]])]),s("div",null,[a(d,{for:"statutory_type_id",value:`${l("statutory type")}`},null,8,["value"]),c(s("select",{"onUpdate:modelValue":r[4]||(r[4]=t=>o(e).statutory_type_id=t),error:o(e).errors.statutory_type_id,class:"mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm",label:"Bank",required:""},[(u(!0),m(v,null,b(f.statutory_types,t=>(u(),m("option",{key:t.id,value:t.id},i(t.name),9,C))),128))],8,P),[[p,o(e).statutory_type_id]])]),s("div",null,[a(d,{for:"selection",value:`${l("selection")}`},null,8,["value"]),c(s("select",{"onUpdate:modelValue":r[5]||(r[5]=t=>o(e).selection=t),error:o(e).errors.selection,class:"mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm",label:"Bank",required:""},[s("option",M,i(l("yes")),1),s("option",O,i(l("no")),1)],8,D),[[p,o(e).selection]])]),s("div",null,[a(d,{for:"mandatory",value:`${l("mandatory")}`},null,8,["value"]),c(s("select",{"onUpdate:modelValue":r[6]||(r[6]=t=>o(e).mandatory=t),error:o(e).errors.mandatory,class:"mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm",label:"Bank",required:""},[s("option",G,i(l("yes")),1),s("option",H,i(l("no")),1)],8,L),[[p,o(e).mandatory]])]),s("div",null,[a(d,{for:"before_paye",value:`${l("before paye")}`},null,8,["value"]),c(s("select",{"onUpdate:modelValue":r[7]||(r[7]=t=>o(e).before_paye=t),error:o(e).errors.before_paye,class:"mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm",label:"Bank",required:""},[s("option",K,i(l("yes")),1),s("option",Q,i(l("no")),1)],8,J),[[p,o(e).before_paye]])]),s("div",R,[a(d,{for:"employee_ratio",value:`${l("employee ratio")}`},null,8,["value"]),a(y,{id:"employee_ratio",ref:"employee_ratioInput",modelValue:o(e).employee,"onUpdate:modelValue":r[8]||(r[8]=t=>o(e).employee=t),type:"number",min:"0",max:"0.9999999999",step:"any",class:"mt-1 block w-full",autocomplete:"employee_ratio"},null,8,["modelValue"]),a(_,{message:o(e).errors.employee_ratio,class:"mt-2"},null,8,["message"])]),s("div",W,[a(d,{for:"employer_ratio",value:`${l("employer ratio")}`},null,8,["value"]),a(y,{id:"employer_ratio",ref:"employer_ratioInput",modelValue:o(e).employer,"onUpdate:modelValue":r[9]||(r[9]=t=>o(e).employer=t),type:"number",min:"0",max:"0.9999999999",step:"any",class:"mt-1 block w-full",autocomplete:"employer_ratio"},null,8,["modelValue"]),a(_,{message:o(e).errors.employer_ratio,class:"mt-2"},null,8,["message"])]),s("div",X,[a(d,{for:"due_date",value:`${l("due date")}`},null,8,["value"]),a(y,{id:"due_date",ref:"due_dateInput",modelValue:o(e).date_required,"onUpdate:modelValue":r[10]||(r[10]=t=>o(e).date_required=t),type:"date",class:"mt-1 block w-full",autocomplete:"due_date"},null,8,["modelValue"]),a(_,{message:o(e).errors.due_date,class:"mt-2"},null,8,["message"])]),s("div",Y,[a(S,{disabled:o(e).processing},{default:V(()=>[q(i(l("save")),1)]),_:1},8,["disabled"]),a(x,{"enter-active-class":"transition ease-in-out","enter-from-class":"opacity-0","leave-active-class":"transition ease-in-out","leave-to-class":"opacity-0"},{default:V(()=>[o(e).recentlySuccessful?(u(),m("p",Z,i(l("saved"))+".",1)):B("",!0)]),_:1})])],40,I)]))}};export{re as default};
