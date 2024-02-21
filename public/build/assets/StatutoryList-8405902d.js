import{r as k,d as v,o as r,c as h,w as d,a as t,t as s,b as i,u as m,Z as S,e as V,v as $,g,h as N,j as f,f as u,i as _,F as j,O as B}from"./app-ec8b9ce4.js";import{_ as O}from"./AuthenticatedLayout-5a58aa4e.js";import{S as I}from"./SectionBorder-8a4073ef.js";import{I as x}from"./Icon-16df6851.js";import{S as T,_ as C}from"./SearchFilter-6d09436f.js";import"./ApplicationLogo-2d8f8bcb.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./ResponsiveNavLink-f0ec292f.js";const D={class:"mb-1 ml-4 text-3xl font-bold"},L={class:"mx-4"},U={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},q={class:"flex items-center justify-between mb-6"},E={class:"block text-gray-700"},F=t("option",{value:null},null,-1),M={value:"with"},P={value:"only"},R={class:"bg-white rounded-md shadow overflow-x-auto"},Z={class:"w-full whitespace-nowrap"},z={class:"text-left font-bold"},A={class:"pb-2 pt-2 px-6"},G={class:"pb-2 pt-2 px-6"},H={class:"pb-2 pt-2 px-2"},J={class:"pb-2 pt-2 px-6"},K={class:"pb-2 pt-2 px-6"},Q={class:"border-t"},W={class:"border-t"},X={class:"border-t"},Y={class:"border-t"},tt={class:"border-t"},et={class:"hover:bg-gray-100 focus-within:bg-gray-100"},st={class:"border-t px-6 py-2"},at=t("td",{class:"border-t"},null,-1),lt=t("td",{class:"border-t"},null,-1),ot=t("td",{class:"border-t"},null,-1),rt={class:"border-t px-6 py-2 text-sm"},it={key:0},nt=t("td",{class:"px-6 py-4 border-t",colspan:"4"},"No pays found.",-1),dt=[nt],bt={__name:"StatutoryList",props:{pay_statutories:Object,max_pay:Number,total_statutory:Number,statutory_name:String,translations:Object,filters:Object},setup(l){const p=l,c=k({id:null,search:p.filters.search,trashed:p.filters.trashed});let y=null;v(c,function(o){clearTimeout(y),y=setTimeout(()=>{const n={};for(const b in o)o[b]!==null&&(n[b]=o[b]);const e={preserveState:!0};B.get("/nets",n,e)},150)},{deep:!0});const w=()=>{for(const o in c.value)c.value[o]=null},a=(o,n)=>p.translations[o]||o;return(o,n)=>(r(),h(O,{translations:l.translations},{header:d(()=>[t("h1",D,s(l.statutory_name+" "+a("details")+" for "+l.max_pay),1)]),default:d(()=>[t("div",L,[t("div",U,[i(m(S),{title:`${a("statutory list")}`},null,8,["title"]),t("div",q,[i(T,{modelValue:c.value.search,"onUpdate:modelValue":n[1]||(n[1]=e=>c.value.search=e),transitions:l.translations,class:"mr-4 w-full max-w-md",onReset:w},{default:d(()=>[t("label",E,s(a("trashed:")),1),V(t("select",{"onUpdate:modelValue":n[0]||(n[0]=e=>c.value.trashed=e),class:"form-select mt-1 w-full"},[F,t("option",M,s(a("with trashed")),1),t("option",P,s(a("only trashed")),1)],512),[[$,c.value.trashed]])]),_:1},8,["modelValue","transitions"])]),t("div",R,[t("table",Z,[t("thead",null,[t("tr",z,[t("th",A,s(a("first name")),1),t("th",G,s(a("last name")),1),t("th",H,s(a("pay"))+" #",1),t("th",J,s(a("number")),1),t("th",K,s(a("amount")),1)])]),t("tbody",null,[(r(!0),g(j,null,N(l.pay_statutories.data,e=>(r(),g("tr",{key:e.id,class:"hover:bg-gray-100 focus-within:bg-gray-100"},[t("td",Q,[i(m(_),{class:"flex items-center px-6 py-2 focus:text-indigo-500 text-sm",href:`/pay_statutories/${e.id}/edit`},{default:d(()=>[f(s(e.first_name)+" ",1),e.deleted_at?(r(),h(x,{key:0,name:"trash",class:"flex-shrink-0 ml-2 w-3 h-3 fill-gray-400"})):u("",!0)]),_:2},1032,["href"])]),t("td",W,[i(m(_),{class:"flex items-center px-6 py-2 focus:text-indigo-500 text-sm",href:`/pay_statutories/${e.id}/edit`},{default:d(()=>[f(s(e.last_name)+" ",1),e.deleted_at?(r(),h(x,{key:0,name:"trash",class:"flex-shrink-0 ml-2 w-3 h-3 fill-gray-400"})):u("",!0)]),_:2},1032,["href"])]),t("td",X,[i(m(_),{class:"flex items-center px-6 py-2 focus:text-indigo-500 text-sm",href:`/pay_statutories/${e.id}/edit`},{default:d(()=>[f(s(e.pay_number)+" ",1),e.deleted_at?(r(),h(x,{key:0,name:"trash",class:"flex-shrink-0 ml-2 w-3 h-3 fill-gray-400"})):u("",!0)]),_:2},1032,["href"])]),t("td",Y,[i(m(_),{class:"flex items-center px-6 py-2 focus:text-indigo-500 text-sm",href:`/pay_statutories/${e.id}/edit`},{default:d(()=>[f(s(e.employee_statutory_no)+" ",1),e.deleted_at?(r(),h(x,{key:0,name:"trash",class:"flex-shrink-0 ml-2 w-3 h-3 fill-gray-400"})):u("",!0)]),_:2},1032,["href"])]),t("td",tt,[i(m(_),{class:"flex items-center px-6 py-2 focus:text-indigo-500 text-sm",href:`/pay_statutories/${e.id}/edit`},{default:d(()=>[f(s(e.total)+" ",1),e.deleted_at?(r(),h(x,{key:0,name:"trash",class:"flex-shrink-0 ml-2 w-3 h-3 fill-gray-400"})):u("",!0)]),_:2},1032,["href"])])]))),128)),t("tr",et,[t("td",st,s(a("total")),1),at,lt,ot,t("td",rt,s(l.total_statutory),1)]),l.pay_statutories.length===0?(r(),g("tr",it,dt)):u("",!0)])])]),i(C,{class:"mt-6",links:l.pay_statutories.links},null,8,["links"])]),i(I)])]),_:1},8,["translations"]))}};export{bt as default};
