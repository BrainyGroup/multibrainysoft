import{o as u,c as y,w as r,a as e,t as _,b as o,u as l,Z as f}from"./app-d0964fae.js";import{_ as x}from"./AuthenticatedLayout-eca58e6b.js";import{S as h}from"./SectionBorder-d8435dfb.js";import{P as i,D as n,j as b,p as v}from"./buttons.colVis-f65bbafe.js";import"./ApplicationLogo-354255e7.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./ResponsiveNavLink-ab0782fb.js";const w={class:"mb-1 text-3xl font-bold"},B={class:"mx-4"},g={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},$={class:"bg-white rounded-md shadow overflow-x-auto text-sm"},V={__name:"PayeYearly",props:{paye_yearly:Array,translations:Object,year:String},setup(t){const c=t;i.use(n),n.Buttons.jszip(b),n.Buttons.pdfMake(v);const m={dom:"Bfrtip",select:!0,responsive:!0},a=(s,p)=>c.translations[s]||s,d=[{data:"month",title:`${a("month")}`},{data:"paye_amount",title:`${a("amount")} #`},{data:"paye_balance",title:`${a("balance")}`}];return(s,p)=>(u(),y(x,{translations:t.translations},{header:r(()=>[e("h1",w,_(a("paye for")+" "+t.year),1)]),default:r(()=>[e("div",B,[e("div",g,[o(l(f),{title:`${a("paye for ")+t.year} `},null,8,["title"]),e("div",$,[o(l(i),{data:t.paye_yearly,columns:d,options:m,class:"display",width:"100%"},null,8,["data"])])]),o(h)])]),_:1},8,["translations"]))}};export{V as default};
