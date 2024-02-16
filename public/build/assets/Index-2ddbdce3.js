import{r as k,d as w,o as l,c as r,w as f,a as t,t as s,b as u,u as D,Z as V,e as S,v as j,g as x,h as B,j as i,f as d,F as O,O as b}from"./app-2c7d1a44.js";import{_ as N}from"./AuthenticatedLayout-62b37a75.js";import{S as $}from"./SectionBorder-a8f1ddf7.js";import{I as h}from"./Icon-ea9a6cd1.js";import{S as I,_ as T}from"./SearchFilter-1eb49d33.js";import{D as C}from"./DeleteButton-3d086a1c.js";import"./ApplicationLogo-ddd2dcec.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./ResponsiveNavLink-cbada9db.js";const U={class:"mb-1 ml-4 text-3xl font-bold"},q={class:"mx-4"},E={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},F={class:"flex items-center justify-between mb-6"},L={class:"block text-gray-700"},M=t("option",{value:null},null,-1),P={value:"with"},R={value:"only"},Z={class:"bg-white rounded-md shadow overflow-x-auto"},z={class:"w-full whitespace-nowrap"},A={class:"text-left font-bold"},G={class:"pb-2 pt-2 px-6"},H={class:"pb-2 pt-2 px-6"},J={class:"pb-2 pt-2 px-6"},K={class:"pb-2 pt-2 px-6"},Q={class:"pb-2 pt-2 px-6"},W={class:"pb-2 pt-2 px-6"},X={class:"pb-2 pt-2 px-6"},Y={class:"pb-2 pt-2 px-6"},tt={class:"border-t"},et={class:"flex items-center px-6 py-2 focus:text-indigo-500 text-sm"},st={class:"border-t"},at={class:"flex items-center px-6 py-2 focus:text-indigo-500 text-sm"},ot={class:"border-t"},lt={class:"flex items-center px-6 py-2 focus:text-indigo-500 text-sm"},nt={class:"border-t"},rt={class:"flex items-center px-6 py-2 focus:text-indigo-500 text-sm"},it={class:"border-t"},dt={class:"flex items-center px-6 py-2 focus:text-indigo-500 text-sm"},ct={class:"border-t"},ht={class:"flex items-center px-6 py-2 focus:text-indigo-500 text-sm"},_t={class:"border-t"},mt={class:"flex items-center px-6 py-2 focus:text-indigo-500 text-sm"},ut={class:"border-t"},ft={key:0},pt=t("td",{class:"px-6 py-4 border-t",colspan:"4"},"No deduction found.",-1),xt=[pt],Bt={__name:"Index",props:{deductions:Object,can:Object,translations:Object,filters:Object},setup(_){const p=_,v=o=>{b.delete(route("deductions.destroy",o))},c=k({id:null,search:p.filters.search,trashed:p.filters.trashed});let y=null;w(c,function(o){clearTimeout(y),y=setTimeout(()=>{const n={};for(const m in o)o[m]!==null&&(n[m]=o[m]);const e={preserveState:!0};b.get("/deductions",n,e)},150)},{deep:!0});const g=()=>{for(const o in c.value)c.value[o]=null},a=(o,n)=>p.translations[o]||o;return(o,n)=>(l(),r(N,{translations:_.translations},{header:f(()=>[t("h1",U,s(a("deductions")),1)]),default:f(()=>[t("div",q,[t("div",E,[u(D(V),{title:`${a("deductions")}`},null,8,["title"]),t("div",F,[u(I,{modelValue:c.value.search,"onUpdate:modelValue":n[1]||(n[1]=e=>c.value.search=e),transitions:_.translations,class:"mr-4 w-full max-w-md",onReset:g},{default:f(()=>[t("label",L,s(a("trashed:")),1),S(t("select",{"onUpdate:modelValue":n[0]||(n[0]=e=>c.value.trashed=e),class:"form-select mt-1 w-full"},[M,t("option",P,s(a("with trashed")),1),t("option",R,s(a("only trashed")),1)],512),[[j,c.value.trashed]])]),_:1},8,["modelValue","transitions"])]),t("div",Z,[t("table",z,[t("thead",null,[t("tr",A,[t("th",G,s(a("#")),1),t("th",H,s(a("first name")),1),t("th",J,s(a("last name")),1),t("th",K,s(a("deduction type")),1),t("th",Q,s(a("start date")),1),t("th",W,s(a("end date")),1),t("th",X,s(a("amount")),1),t("th",Y,s(a("delete")),1)])]),t("tbody",null,[(l(!0),x(O,null,B(_.deductions.data,(e,m)=>(l(),x("tr",{key:e.id,class:"hover:bg-gray-100 focus-within:bg-gray-100"},[t("td",tt,[t("div",et,[i(s(m+1)+" ",1),e.deleted_at?(l(),r(h,{key:0,name:"trash",class:"flex-shrink-0 ml-2 w-3 h-3 fill-gray-400"})):d("",!0)])]),t("td",st,[t("div",at,[i(s(e.first_name)+" ",1),e.deleted_at?(l(),r(h,{key:0,name:"trash",class:"flex-shrink-0 ml-2 w-3 h-3 fill-gray-400"})):d("",!0)])]),t("td",ot,[t("div",lt,[i(s(e.last_name)+" ",1),e.deleted_at?(l(),r(h,{key:0,name:"trash",class:"flex-shrink-0 ml-2 w-3 h-3 fill-gray-400"})):d("",!0)])]),t("td",nt,[t("div",rt,[i(s(e.deduction_name)+" ",1),e.deleted_at?(l(),r(h,{key:0,name:"trash",class:"flex-shrink-0 ml-2 w-3 h-3 fill-gray-400"})):d("",!0)])]),t("td",it,[t("div",dt,[i(s(e.start_date)+" ",1),e.deleted_at?(l(),r(h,{key:0,name:"trash",class:"flex-shrink-0 ml-2 w-3 h-3 fill-gray-400"})):d("",!0)])]),t("td",ct,[t("div",ht,[i(s(e.end_date)+" ",1),e.deleted_at?(l(),r(h,{key:0,name:"trash",class:"flex-shrink-0 ml-2 w-3 h-3 fill-gray-400"})):d("",!0)])]),t("td",_t,[t("div",mt,[i(s(e.amount)+" ",1),e.deleted_at?(l(),r(h,{key:0,name:"trash",class:"flex-shrink-0 ml-2 w-3 h-3 fill-gray-400"})):d("",!0)])]),t("td",ut,[u(C,{onDelete:yt=>v(`${e.id}`)},{default:f(()=>[i("Delete")]),_:2},1032,["onDelete"])])]))),128)),_.deductions.length===0?(l(),x("tr",ft,xt)):d("",!0)])])]),u(T,{class:"mt-6",links:_.deductions.links},null,8,["links"])]),u($)])]),_:1},8,["translations"]))}};export{Bt as default};
