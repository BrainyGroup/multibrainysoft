import{r as V,d as $,o as r,c as u,w as n,a as e,t as s,b as i,u as h,Z as D,e as S,v as j,i as _,f,g as b,h as B,j as p,F as O,O as v}from"./app-2c7d1a44.js";import{_ as N}from"./AuthenticatedMainLayout-66812ef0.js";import{S as I}from"./SectionBorder-a8f1ddf7.js";import{I as y}from"./Icon-ea9a6cd1.js";import{S as T,_ as U}from"./SearchFilter-1eb49d33.js";import{D as C}from"./DeleteButton-3d086a1c.js";import"./ApplicationLogo-ddd2dcec.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./ResponsiveNavLink-cbada9db.js";const q={class:"mb-1 ml-4 text-3xl font-bold"},E={class:"mx-4"},F={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},L={class:"flex items-center justify-between mb-6"},M={class:"block text-gray-700"},P=e("option",{value:null},null,-1),R={value:"with"},Z={value:"only"},z={class:"hidden md:inline"},A={class:"bg-white rounded-md shadow overflow-x-auto"},G={class:"w-full whitespace-nowrap"},H={class:"text-left font-bold"},J={class:"pb-4 pt-6 px-6"},K={class:"pb-4 pt-6 px-6"},Q={class:"pb-4 pt-6 px-6"},W={class:"pb-4 pt-6 px-6"},X={class:"border-t"},Y={class:"border-t"},ee={class:"border-t"},te={class:"border-t"},se={key:0},ae=e("td",{class:"px-6 py-2 border-t",colspan:"4"},"No users found.",-1),oe=[ae],me={__name:"Index",props:{filters:Object,can:Object,users:Object,translations:Object},setup(d){const x=d,c=V({search:x.filters.search,trashed:x.filters.trashed}),w=o=>{v.delete(route("users.destroy",o))};let g=null;$(c,function(o){clearTimeout(g),g=setTimeout(()=>{const l={};for(const m in o)o[m]!==null&&(l[m]=o[m]);const t={preserveState:!0};v.get("/users",l,t)},150)},{deep:!0});const k=()=>{for(const o in c.value)c.value[o]=null},a=(o,l)=>x.translations[o]||o;return(o,l)=>(r(),u(N,{translations:d.translations},{header:n(()=>[e("h1",q,s(a("users")),1)]),default:n(()=>[e("div",E,[e("div",F,[i(h(D),{title:`${a("users")}`},null,8,["title"]),e("div",L,[i(T,{modelValue:c.value.search,"onUpdate:modelValue":l[1]||(l[1]=t=>c.value.search=t),transitions:d.translations,class:"mr-4 w-full max-w-md",onReset:k},{default:n(()=>[e("label",M,s(a("trashed:")),1),S(e("select",{"onUpdate:modelValue":l[0]||(l[0]=t=>c.value.trashed=t),class:"form-select mt-1 w-full"},[P,e("option",R,s(a("with trashed")),1),e("option",Z,s(a("only trashed")),1)],512),[[j,c.value.trashed]])]),_:1},8,["modelValue","transitions"]),d.can.create_user?(r(),u(h(_),{key:0,class:"inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition",href:"/users/create"},{default:n(()=>[e("span",null,s(a("create")),1),e("span",z," "+s(a("user")),1)]),_:1})):f("",!0)]),e("div",A,[e("table",G,[e("thead",null,[e("tr",H,[e("th",J,s(a("name")),1),e("th",K,s(a("email")),1),e("th",Q,s(a("mobile")),1),e("th",W,s(a("delete")),1)])]),e("tbody",null,[(r(!0),b(O,null,B(d.users.data,t=>(r(),b("tr",{key:t.id,class:"hover:bg-gray-100 focus-within:bg-gray-100"},[e("td",X,[i(h(_),{class:"flex items-center px-6 py-2 focus:text-indigo-500",href:`/users/${t.id}/edit`},{default:n(()=>[p(s(t.name)+" ",1),t.deleted_at?(r(),u(y,{key:0,name:"trash",class:"flex-shrink-0 ml-2 w-3 h-3 fill-gray-400"})):f("",!0)]),_:2},1032,["href"])]),e("td",Y,[i(h(_),{class:"flex items-center px-6 py-2 focus:text-indigo-500",href:`/users/${t.id}/edit`},{default:n(()=>[p(s(t.email)+" ",1),t.deleted_at?(r(),u(y,{key:0,name:"trash",class:"flex-shrink-0 ml-2 w-3 h-3 fill-gray-400"})):f("",!0)]),_:2},1032,["href"])]),e("td",ee,[i(h(_),{class:"flex items-center px-6 py-2 focus:text-indigo-500",href:`/users/${t.id}/edit`},{default:n(()=>[p(s(t.mobile)+" ",1),t.deleted_at?(r(),u(y,{key:0,name:"trash",class:"flex-shrink-0 ml-2 w-3 h-3 fill-gray-400"})):f("",!0)]),_:2},1032,["href"])]),e("td",te,[i(C,{onDelete:m=>w(`${t.id}`)},{default:n(()=>[p("Delete")]),_:2},1032,["onDelete"])])]))),128)),d.users.length===0?(r(),b("tr",se,oe)):f("",!0)])])]),i(U,{class:"mt-6",links:d.users.links},null,8,["links"])]),i(I)])]),_:1},8,["translations"]))}};export{me as default};
