import{r as g,d as k,o as l,c as n,w as m,a as t,t as s,b as x,u as y,Z as w,g as f,h as v,j as i,f as c,i as S,F as B,O as N}from"./app-2c7d1a44.js";import{_ as j}from"./AuthenticatedLayout-62b37a75.js";import{S as O}from"./SectionBorder-a8f1ddf7.js";import{I as d}from"./Icon-ea9a6cd1.js";import"./ApplicationLogo-ddd2dcec.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./ResponsiveNavLink-cbada9db.js";const V={class:"mb-1 ml-4 text-3xl font-bold"},$={class:"mx-4"},I={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},T=t("div",{class:"flex items-center justify-between mb-6"},null,-1),C={class:"bg-white rounded-md shadow overflow-x-auto"},q={class:"w-full whitespace-nowrap"},D={class:"text-left font-bold"},E={class:"pb-2 pt-2 px-6"},L={class:"pb-2 pt-2 px-6"},P={class:"pb-2 pt-2 px-2"},Z={class:"pb-2 pt-2 px-6"},z={class:"pb-2 pt-2 px-6"},A={class:"border-t px-6 py-2 text-sm"},F={class:"border-t px-6 py-2 text-sm"},G={class:"border-t px-6 py-2 text-sm"},H={class:"border-t px-6 py-2 text-sm"},J={class:"border-t"},K={class:"hover:bg-gray-100 focus-within:bg-gray-100"},M={class:"border-t px-6 py-2"},Q={class:"border-t px-6 py-2"},R={class:"border-t px-6 py-2"},U={class:"border-t px-6 py-2"},W={class:"border-t px-6 py-2 text-sm"},X={key:0},Y=t("td",{class:"px-6 py-4 border-t",colspan:"4"},"No pays found.",-1),tt=[Y],ct={__name:"NetByBank",props:{net_by_banks:Object,max_pay:String,net_total:String,net_balance:String,net_paid:String,translations:Object,filters:Object},setup(a){const p=a,b=g({id:null,search:p.filters.search,trashed:p.filters.trashed});let u=null;k(b,function(r){clearTimeout(u),u=setTimeout(()=>{const h={};for(const _ in r)r[_]!==null&&(h[_]=r[_]);const e={preserveState:!0};N.get("/pays/net_by_bank",h,e)},150)},{deep:!0});const o=(r,h)=>p.translations[r]||r;return(r,h)=>(l(),n(j,{translations:a.translations},{header:m(()=>[t("h1",V,s(o("net by bank for ")+a.max_pay),1)]),default:m(()=>[t("div",$,[t("div",I,[x(y(w),{title:`${o("net by bank")}`},null,8,["title"]),T,t("div",C,[t("table",q,[t("thead",null,[t("tr",D,[t("th",E,s(o("bank")),1),t("th",L,s(o("amount")),1),t("th",P,s(o("paid"))+" #",1),t("th",Z,s(o("balance")),1),t("th",z,s(o("details")),1)])]),t("tbody",null,[(l(!0),f(B,null,v(a.net_by_banks.data,e=>(l(),f("tr",{key:e.id,class:"hover:bg-gray-100 focus-within:bg-gray-100"},[t("td",A,[i(s(e.bank_name)+" ",1),e.deleted_at?(l(),n(d,{key:0,name:"trash",class:"flex-shrink-0 ml-2 w-3 h-3 fill-gray-400"})):c("",!0)]),t("td",F,[i(s(e.amount)+" ",1),e.deleted_at?(l(),n(d,{key:0,name:"trash",class:"flex-shrink-0 ml-2 w-3 h-3 fill-gray-400"})):c("",!0)]),t("td",G,[i(s(e.paid)+" ",1),e.deleted_at?(l(),n(d,{key:0,name:"trash",class:"flex-shrink-0 ml-2 w-3 h-3 fill-gray-400"})):c("",!0)]),t("td",H,[i(s(e.balance)+" ",1),e.deleted_at?(l(),n(d,{key:0,name:"trash",class:"flex-shrink-0 ml-2 w-3 h-3 fill-gray-400"})):c("",!0)]),t("td",J,[x(y(S),{class:"flex items-center px-6 py-2 focus:text-indigo-500 text-sm",href:`/pays/net_list_by_bank?max_pay=${a.max_pay}&bank_id=${e.bank_id}`},{default:m(()=>[i(s(o("net list by bank"))+" ",1),e.deleted_at?(l(),n(d,{key:0,name:"trash",class:"flex-shrink-0 ml-2 w-3 h-3 fill-gray-400"})):c("",!0)]),_:2},1032,["href"])])]))),128)),t("tr",K,[t("td",M,s(o("total")),1),t("td",Q,s(a.net_total),1),t("td",R,s(a.net_paid),1),t("td",U,s(a.net_balance),1),t("td",W,s(r.total_statutory),1)]),a.net_by_banks.length===0?(l(),f("tr",X,tt)):c("",!0)])])])]),x(O)])]),_:1},8,["translations"]))}};export{ct as default};
