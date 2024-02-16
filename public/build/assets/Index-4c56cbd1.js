import{o as e,c as m,w as r,a as t,t as n,b as i,u as c,Z as p,i as h,g as d,h as x,j as b,f as _,F as g}from"./app-2c7d1a44.js";import{_ as y}from"./AuthenticatedLayout-62b37a75.js";import{S as w}from"./SectionBorder-a8f1ddf7.js";import{I as v}from"./Icon-ea9a6cd1.js";import"./ApplicationLogo-ddd2dcec.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./ResponsiveNavLink-cbada9db.js";const k={class:"mb-1 ml-4 text-3xl font-bold"},B={class:"mx-4"},N={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},j={class:"flex items-center justify-between mb-6"},V=t("span",null,"Create",-1),C={class:"hidden md:inline"},I={class:"bg-white rounded-md shadow overflow-x-auto"},S={class:"w-full whitespace-nowrap"},$={class:"text-left font-bold"},F={class:"pb-4 pt-6 px-6"},O={class:"border-t"},A={key:0},D=t("td",{class:"px-6 py-2 border-t",colspan:"4"},"No roles found.",-1),E=[D],J={__name:"Index",props:{roles:Array,can:Object,translations:Object},setup(s){const f=s,o=(l,u)=>f.translations[l]||l;return(l,u)=>(e(),m(y,{translations:s.translations},{header:r(()=>[t("h1",k,n(o("roles")),1)]),default:r(()=>[t("div",B,[t("div",N,[i(c(p),{title:`${o("roles")}`},null,8,["title"]),t("div",j,[i(c(h),{class:"inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition",href:"/roles/create"},{default:r(()=>[V,t("span",C," "+n(o("role")),1)]),_:1})]),t("div",I,[t("table",S,[t("thead",null,[t("tr",$,[t("th",F,n(o("name")),1)])]),t("tbody",null,[(e(!0),d(g,null,x(s.roles,a=>(e(),d("tr",{key:a.id,class:"hover:bg-gray-100 focus-within:bg-gray-100"},[t("td",O,[i(c(h),{class:"flex items-center px-6 py-2 focus:text-indigo-500",href:`/roles/${a.id}/edit`},{default:r(()=>[b(n(a.name)+" ",1),a.deleted_at?(e(),m(v,{key:0,name:"trash",class:"flex-shrink-0 ml-2 w-3 h-3 fill-gray-400"})):_("",!0)]),_:2},1032,["href"])])]))),128)),s.roles.length===0?(e(),d("tr",A,E)):_("",!0)])])])]),i(w)])]),_:1},8,["translations"]))}};export{J as default};
