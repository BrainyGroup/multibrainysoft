import{_ as r}from"./AuthenticatedLayout-62b37a75.js";import c from"./EditForm-2f30cc8d.js";import{o as m,c as p,w as o,a,t as d,b as n,u as y,Z as _}from"./app-2c7d1a44.js";import"./ApplicationLogo-ddd2dcec.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./ResponsiveNavLink-cbada9db.js";import"./TextInput-c5171d56.js";import"./PrimaryButton-e0cb1bc2.js";const u={class:"font-semibold text-xl text-gray-800 leading-tight ml-4"},x={class:"py-12"},g={class:"max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6"},h={class:"p-4 sm:p-8 bg-white shadow sm:rounded-lg"},j={__name:"Edit",props:{scale:Object,translations:Object,payroll_groups:Array,employment_types:Array,pay_bases:Array},setup(t){const l=t,e=(s,i)=>l.translations[s]||s;return(s,i)=>(m(),p(r,{translations:t.translations},{header:o(()=>[a("h2",u,d(e("scale")),1)]),default:o(()=>[a("div",x,[a("div",g,[n(y(_),{title:`${e("edit")} ${e("scale")}`},null,8,["title"]),a("div",h,[n(c,{scale:t.scale,pay_bases:t.pay_bases,employment_types:t.employment_types,organizations:s.organizations,translations:t.translations,class:"max-w-xl"},null,8,["scale","pay_bases","employment_types","organizations","translations"])])])])]),_:1},8,["translations"]))}};export{j as default};
