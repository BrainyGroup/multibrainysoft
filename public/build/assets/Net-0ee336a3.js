import{o as p,c as u,w as i,a as e,t as f,b as n,u as l,Z as x}from"./app-ec8b9ce4.js";import{_ as b}from"./AuthenticatedLayout-5a58aa4e.js";import{S as h}from"./SectionBorder-8a4073ef.js";import{P as r,D as o,j as y,p as $}from"./buttons.colVis-d2c0bab3.js";import"./ApplicationLogo-2d8f8bcb.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./ResponsiveNavLink-f0ec292f.js";const g={class:"mb-1 text-3xl font-bold"},v={class:"mx-4"},w={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},B={class:"bg-white rounded-md shadow overflow-x-auto text-sm"},A={__name:"Net",props:{nets:Array,net_paid:String,net_balance:String,net_total:String,translations:Object,max_pay:String},setup(a){const m=a;r.use(o),o.Buttons.jszip(y),o.Buttons.pdfMake($);const c={dom:"Bfrtip",select:!1,responsive:!0},t=(s,_)=>m.translations[s]||s,d=[{data:"first_name",title:`${t("first name")}`},{data:"middle_name",title:`${t("middle name")}`},{data:"last_name",title:`${t("last name")}`},{data:"bank_name",title:`${t("bank name")}`},{data:"account_number",title:`${t("account")} #`},{data:"net",title:`${t("net")}`},{data:"net_balance",title:`${t("balance")}`}];return(s,_)=>(p(),u(b,{translations:a.translations},{header:i(()=>[e("h1",g,f(t("net pay for ")+a.max_pay),1)]),default:i(()=>[e("div",v,[e("div",w,[n(l(x),{title:`${t("net pay for ")+a.max_pay} `},null,8,["title"]),e("div",B,[n(l(r),{data:a.nets,columns:d,options:c,class:"display",width:"100%"},null,8,["data"])])]),n(h)])]),_:1},8,["translations"]))}};export{A as default};
