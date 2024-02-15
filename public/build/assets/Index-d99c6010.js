import{r as v,d as w,o,c as d,w as r,a as t,t as s,b as a,u as c,Z as $,e as V,v as S,g as y,h as j,j as h,f,i as u,F as B,O as D}from"./app-d0964fae.js";import{_ as O}from"./AuthenticatedLayout-eca58e6b.js";import{S as N}from"./SectionBorder-d8435dfb.js";import{I as _}from"./Icon-1506640d.js";import{S as I,_ as T}from"./SearchFilter-2ca46f21.js";import{D as C}from"./DeleteButton-86749629.js";import"./ApplicationLogo-354255e7.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./ResponsiveNavLink-ab0782fb.js";const P={class:"mb-1 ml-4 text-3xl font-bold"},U={class:"mx-4"},q={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},E={class:"flex items-center justify-between mb-6"},F={class:"block text-gray-700"},L=t("option",{value:null},null,-1),M={value:"with"},R={value:"only"},Z={class:"bg-white rounded-md shadow overflow-x-auto"},z={class:"w-full whitespace-nowrap"},A={class:"text-left font-bold"},G={class:"pb-2 pt-2 px-6"},H={class:"pb-2 pt-2 px-6"},J={class:"pb-2 pt-2 px-6"},K={class:"pb-2 pt-2 px-6"},Q={class:"pb-2 pt-2 px-6"},W={class:"pb-2 pt-2 px-6"},X={class:"pb-2 pt-2 px-6"},Y={class:"pb-2 pt-2 px-2"},tt={class:"border-t"},et={class:"border-t"},st={class:"border-t"},lt={class:"border-t"},at={class:"border-t"},ot={class:"border-t"},rt={class:"border-t"},it={class:"border-t"},nt={key:0},dt=t("td",{class:"px-6 py-4 border-t",colspan:"4"},"No pay_allowances found.",-1),ct=[dt],gt={__name:"Index",props:{pay_allowances:Object,can:Object,translations:Object,filters:Object},setup(x){const b=x,m=v({id:null,search:b.filters.search,trashed:b.filters.trashed});let g=null;w(m,function(i){clearTimeout(g),g=setTimeout(()=>{const n={};for(const p in i)i[p]!==null&&(n[p]=i[p]);const e={preserveState:!0};D.get("/pay_allowances",n,e)},150)},{deep:!0});const k=()=>{for(const i in m.value)m.value[i]=null},l=(i,n)=>b.translations[i]||i;return(i,n)=>(o(),d(O,{translations:x.translations},{header:r(()=>[t("h1",P,s(l("pay allowances")),1)]),default:r(()=>[t("div",U,[t("div",q,[a(c($),{title:`${l("pay allowances")}`},null,8,["title"]),t("div",E,[a(I,{modelValue:m.value.search,"onUpdate:modelValue":n[1]||(n[1]=e=>m.value.search=e),transitions:x.translations,class:"mr-4 w-full max-w-md",onReset:k},{default:r(()=>[t("label",F,s(l("trashed:")),1),V(t("select",{"onUpdate:modelValue":n[0]||(n[0]=e=>m.value.trashed=e),class:"form-select mt-1 w-full"},[L,t("option",M,s(l("with trashed")),1),t("option",R,s(l("only trashed")),1)],512),[[S,m.value.trashed]])]),_:1},8,["modelValue","transitions"])]),t("div",Z,[t("table",z,[t("thead",null,[t("tr",A,[t("th",G,s(l("first name")),1),t("th",H,s(l("last name")),1),t("th",J,s(l("type")),1),t("th",K,s(l("pay number")),1),t("th",Q,s(l("year")),1),t("th",W,s(l("month")),1),t("th",X,s(l("amount")),1),t("th",Y,s(l("delete")),1)])]),t("tbody",null,[(o(!0),y(B,null,j(x.pay_allowances.data,e=>(o(),y("tr",{key:e.id,class:"hover:bg-gray-100 focus-within:bg-gray-100"},[t("td",tt,[a(c(u),{class:"flex items-center px-6 py-2 focus:text-indigo-500 text-sm",href:`/pay_allowances/${e.id}/edit`},{default:r(()=>[h(s(e.first_name)+" ",1),e.deleted_at?(o(),d(_,{key:0,name:"trash",class:"flex-shrink-0 ml-2 w-3 h-3 fill-gray-400"})):f("",!0)]),_:2},1032,["href"])]),t("td",et,[a(c(u),{class:"flex items-center px-6 py-2 focus:text-indigo-500 text-sm",href:`/pay_allowances/${e.id}/edit`},{default:r(()=>[h(s(e.last_name)+" ",1),e.deleted_at?(o(),d(_,{key:0,name:"trash",class:"flex-shrink-0 ml-2 w-3 h-3 fill-gray-400"})):f("",!0)]),_:2},1032,["href"])]),t("td",st,[a(c(u),{class:"flex items-center px-6 py-2 focus:text-indigo-500 text-sm",href:`/pay_allowances/${e.id}/edit`},{default:r(()=>[h(s(e.allowance_name)+" ",1),e.deleted_at?(o(),d(_,{key:0,name:"trash",class:"flex-shrink-0 ml-2 w-3 h-3 fill-gray-400"})):f("",!0)]),_:2},1032,["href"])]),t("td",lt,[a(c(u),{class:"flex items-center px-6 py-2 focus:text-indigo-500 text-sm",href:`/pay_allowances/${e.id}/edit`},{default:r(()=>[h(s(e.pay_number)+" ",1),e.deleted_at?(o(),d(_,{key:0,name:"trash",class:"flex-shrink-0 ml-2 w-3 h-3 fill-gray-400"})):f("",!0)]),_:2},1032,["href"])]),t("td",at,[a(c(u),{class:"flex items-center px-6 py-2 focus:text-indigo-500 text-sm",href:`/pay_allowances/${e.id}/edit`},{default:r(()=>[h(s(e.year)+" ",1),e.deleted_at?(o(),d(_,{key:0,name:"trash",class:"flex-shrink-0 ml-2 w-3 h-3 fill-gray-400"})):f("",!0)]),_:2},1032,["href"])]),t("td",ot,[a(c(u),{class:"flex items-center px-6 py-2 focus:text-indigo-500 text-sm",href:`/pay_allowances/${e.id}/edit`},{default:r(()=>[h(s(e.month)+" ",1),e.deleted_at?(o(),d(_,{key:0,name:"trash",class:"flex-shrink-0 ml-2 w-3 h-3 fill-gray-400"})):f("",!0)]),_:2},1032,["href"])]),t("td",rt,[a(c(u),{class:"flex items-center px-6 py-2 focus:text-indigo-500 text-sm",href:`/pay_allowances/${e.id}/edit`},{default:r(()=>[h(s(e.amount)+" ",1),e.deleted_at?(o(),d(_,{key:0,name:"trash",class:"flex-shrink-0 ml-2 w-3 h-3 fill-gray-400"})):f("",!0)]),_:2},1032,["href"])]),t("td",it,[a(C,{onDelete:p=>i.deletePayllowance(`${e.id}`)},{default:r(()=>[h(s(l("delete")),1)]),_:2},1032,["onDelete"])])]))),128)),x.pay_allowances.length===0?(o(),y("tr",nt,ct)):f("",!0)])])]),a(T,{class:"mt-6",links:x.pay_allowances.links},null,8,["links"])]),a(N)])]),_:1},8,["translations"]))}};export{gt as default};
