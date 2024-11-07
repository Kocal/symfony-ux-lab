/**
 * Bundled by jsDelivr using Rollup v2.79.1 and Terser v5.19.2.
 * Original file: /npm/svelte@5.1.6/src/index-client.js
 *
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
import {DEV as n} from "esm-env";

var e = Array.isArray, t = Array.from, r = Object.defineProperty, $$get_descriptor = Object.getOwnPropertyDescriptor,
    o = Object.getPrototypeOf;
const i = 2, a = 4, u = 8, f = 16, c = 32, s = 64, d = 128, v = 256, p = 512, h = 1024, w = 2048, _ = 4096, y = 8192,
    m = 16384, g = 1 << 17, b = 1 << 18, x = 1 << 19, $ = Symbol("$state"), E = Symbol("$state metadata");

function S(n) {
    return n === this.v
}

function O() {
    if (n) {
        const n = new Error("effect_update_depth_exceeded\nMaximum update depth exceeded. This can happen when a reactive block or effect repeatedly sets a new value. Svelte limits the number of nested updates to prevent infinite loops");
        throw n.name = "Svelte error", n
    }
    throw new Error("effect_update_depth_exceeded")
}

function T(e) {
    if (n) {
        const n = new Error(`lifecycle_legacy_only\n\`${e}(...)\` cannot be used in runes mode`);
        throw n.name = "Svelte error", n
    }
    throw new Error("lifecycle_legacy_only")
}

const k = {}, A = Symbol("filename");
var j = "font-weight: bold", C = "font-weight: normal";

function M(e) {
    n ? console.warn("%c[svelte] hydration_mismatch\n%c" + (e ? `Hydration failed because the initial UI does not match what was rendered on the server. The error occurred near ${e}` : "Hydration failed because the initial UI does not match what was rendered on the server"), j, C) : console.warn("hydration_mismatch")
}

function L(e) {
    n ? console.warn(`%c[svelte] state_proxy_equality_mismatch\n%cReactive \`$state(...)\` proxies and the values they proxy have different identities. Because of this, comparisons with \`${e}\` will produce unexpected results`, j, C) : console.warn("state_proxy_equality_mismatch")
}

let P, q = !1;

function D(n) {
    q = n
}

function I(n) {
    if (null === n) throw M(), k;
    return P = n
}

function N() {
    return I(V(P))
}

const U = Symbol("ADD_OWNER");

function H(e, t, r = !1, l = !1) {
    if (e && !r) {
        const r = Ln, o = e[E];
        if (o && !W(o, r)) {
            let e = B(o);
            t[A] === r[A] || l || function (e, t, r) {
                n ? console.warn(`%c[svelte] ownership_invalid_binding\n%c${e} passed a value to ${t} with \`bind:\`, but the value is owned by ${r}. Consider creating a binding between ${r} and ${e}`, j, C) : console.warn("ownership_invalid_binding")
            }(r[A], t[A], e[A])
        }
    }
    R(e, t, new Set)
}

function R(n, e, t) {
    const r = n?.[E];
    if (r) "owners" in r && null != r.owners && r.owners.add(e); else if (n && "object" == typeof n) {
        if (t.has(n)) return;
        if (t.add(n), U in n && n[U]) rn(u, (() => {
            n[U](e)
        }), !0); else {
            var l = o(n);
            if (l === Object.prototype) for (const r in n) R(n[r], e, t); else if (l === Array.prototype) for (let r = 0; r < n.length; r += 1) R(n[r], e, t)
        }
    }
}

function W(n, e) {
    return null === n.owners || (n.owners.has(e) || null !== n.parent && W(n.parent, e))
}

function B(n) {
    return n?.owners?.values().next().value ?? B(n.parent)
}

function F(n) {
    return null !== n && "object" == typeof n && $ in n ? n[$] : n
}

var z, $$first_child_getter, $$next_sibling_getter;

function $$init_operations() {
    console.log(z);
    if (void 0 === z) {
        z = window;
        var e = Element.prototype, t = Node.prototype;
        console.log({ e, t })
        $$first_child_getter = $$get_descriptor(t, "firstChild").get, $$next_sibling_getter = $$get_descriptor(t, "nextSibling").get;
        console.log({
            $$get_descriptor,
            $$first_child_getter,
            $$next_sibling_getter
        })
        e.__click = void 0, e.__className = "", e.__attributes = null, e.__styles = null, e.__e = void 0, Text.prototype.__t = void 0, n && (e.__svelte_meta = null, function () {
            const n = Array.prototype, e = Array.__svelte_cleanup;
            e && e();
            const {indexOf: t, lastIndexOf: r, includes: l} = n;
            n.indexOf = function (n, e) {
                const r = t.call(this, n, e);
                return -1 === r && -1 !== t.call(F(this), F(n), e) && L("array.indexOf(...)"), r
            }, n.lastIndexOf = function (n, e) {
                const t = r.call(this, n, e ?? this.length - 1);
                return -1 === t && -1 !== r.call(F(this), F(n), e ?? this.length - 1) && L("array.lastIndexOf(...)"), t
            }, n.includes = function (n, e) {
                const t = l.call(this, n, e);
                return t || l.call(F(this), F(n), e) && L("array.includes(...)"), t
            }, Array.__svelte_cleanup = () => {
                n.indexOf = t, n.lastIndexOf = r, n.includes = l
            }
        }())
    }
}

function Q(n) {
    return $$first_child_getter.call(n)
}

function V(n) {
    return $$next_sibling_getter.call(n)
}

function X(n) {
    var e = n.children;
    if (null !== e) {
        n.children = null;
        for (var t = 0; t < e.length; t += 1) {
            var r = e[t];
            0 != (r.f & i) ? en(r) : fn(r)
        }
    }
}

let Y = [];

function Z(e) {
    var t, r = On;
    if (Tn(e.parent), n) try {
        Y.includes(e) && function () {
            if (n) {
                const n = new Error("derived_references_self\nA derived value cannot reference itself recursively");
                throw n.name = "Svelte error", n
            }
            throw new Error("derived_references_self")
        }(), Y.push(e), X(e), t = qn(e)
    } finally {
        Tn(r), Y.pop()
    } else try {
        X(e), t = qn(e)
    } finally {
        Tn(r)
    }
    return t
}

function nn(n) {
    var e = Z(n);
    Kn(n, !Cn && 0 == (n.f & d) || null === n.deps ? p : w), n.equals(e) || (n.v = e, n.version = ++jn)
}

function en(n) {
    X(n), In(n, 0), Kn(n, y), n.v = n.children = n.deps = n.ctx = n.reactions = null
}

function tn(e) {
    null === On && null === En && function (e) {
        if (n) {
            const n = new Error(`effect_orphan\n\`${e}\` can only be used inside an effect (e.g. during component initialisation)`);
            throw n.name = "Svelte error", n
        }
        throw new Error("effect_orphan")
    }(e), null !== En && 0 != (En.f & d) && function () {
        if (n) {
            const n = new Error("effect_in_unowned_derived\nEffect cannot be created inside a `$derived` value that was not itself created inside an effect");
            throw n.name = "Svelte error", n
        }
        throw new Error("effect_in_unowned_derived")
    }(), yn && function (e) {
        if (n) {
            const n = new Error(`effect_in_teardown\n\`${e}\` cannot be used inside an effect cleanup function`);
            throw n.name = "Svelte error", n
        }
        throw new Error("effect_in_teardown")
    }(e)
}

function rn(e, t, r, l = !0) {
    var o = 0 != (e & s), a = On;
    if (n) for (; null !== a && 0 != (a.f & g);) a = a.parent;
    var u = {
        ctx: Mn,
        deps: null,
        deriveds: null,
        nodes_start: null,
        nodes_end: null,
        f: e | h,
        first: null,
        fn: t,
        last: null,
        next: null,
        parent: o ? null : a,
        prev: null,
        teardown: null,
        transitions: null,
        version: 0
    };
    if (n && (u.component_function = Ln), r) {
        var f = _n;
        try {
            mn(!0), Nn(u), u.f |= m
        } catch (n) {
            throw fn(u), n
        } finally {
            mn(f)
        }
    } else null !== t && function (n) {
        hn === dn && (wn || (wn = !0, queueMicrotask(Wn)));
        var e = n;
        for (; null !== e.parent;) {
            var t = (e = e.parent).f;
            if (0 != (t & (s | c))) {
                if (0 == (t & p)) return;
                e.f ^= p
            }
        }
        bn.push(e)
    }(u);
    if (!(r && null === u.deps && null === u.first && null === u.nodes_start && null === u.teardown && 0 == (u.f & x)) && !o && l && (null !== a && function (n, e) {
        var t = e.last;
        null === t ? e.last = e.first = n : (t.next = n, n.prev = t, e.last = n)
    }(u, a), null !== En && 0 != (En.f & i))) {
        var d = En;
        (d.children ??= []).push(u)
    }
    return u
}

function ln(n) {
    return rn(a, n, !1)
}

function on(n) {
    var e = n.teardown;
    if (null !== e) {
        const n = yn, t = En;
        gn(!0), Sn(null);
        try {
            e.call(null)
        } finally {
            gn(n), Sn(t)
        }
    }
}

function an(n) {
    var e = n.deriveds;
    if (null !== e) {
        n.deriveds = null;
        for (var t = 0; t < e.length; t += 1) en(e[t])
    }
}

function un(n, e = !1) {
    var t = n.first;
    for (n.first = n.last = null; null !== t;) {
        var r = t.next;
        fn(t, e), t = r
    }
}

function fn(e, t = !0) {
    var r = !1;
    if ((t || 0 != (e.f & b)) && null !== e.nodes_start) {
        for (var l = e.nodes_start, o = e.nodes_end; null !== l;) {
            var i = l === o ? null : V(l);
            l.remove(), l = i
        }
        r = !0
    }
    un(e, t && !r), an(e), In(e, 0), Kn(e, y);
    var a = e.transitions;
    if (null !== a) for (const n of a) n.stop();
    on(e);
    var u = e.parent;
    null !== u && null !== u.first && cn(e), n && (e.component_function = null), e.next = e.prev = e.teardown = e.ctx = e.deps = e.parent = e.fn = e.nodes_start = e.nodes_end = null
}

function cn(n) {
    var e = n.parent, t = n.prev, r = n.next;
    null !== t && (t.next = r), null !== r && (r.prev = t), null !== e && (e.first === n && (e.first = r), e.last === n && (e.last = t))
}

function sn(e) {
    if (n) {
        const n = new Error(`lifecycle_outside_component\n\`${e}(...)\` can only be used during component initialisation`);
        throw n.name = "Svelte error", n
    }
    throw new Error("lifecycle_outside_component")
}

const dn = 0, vn = 1, pn = new WeakSet;
let hn = dn, wn = !1, _n = !1, yn = !1;

function mn(n) {
    _n = n
}

function gn(n) {
    yn = n
}

let bn = [], xn = 0, $n = [], En = null;

function Sn(n) {
    En = n
}

let On = null;

function Tn(n) {
    On = n
}

let kn = null, An = 0, jn = 0, Cn = !1, Mn = null, Ln = null;

function Pn(n) {
    var e = n.f;
    if (0 != (e & h)) return !0;
    if (0 != (e & w)) {
        var t = n.deps, r = 0 != (e & d);
        if (null !== t) {
            var l;
            if (0 != (e & v)) {
                for (l = 0; l < t.length; l++) (t[l].reactions ??= []).push(n);
                n.f ^= v
            }
            for (l = 0; l < t.length; l++) {
                var o = t[l];
                if (Pn(o) && nn(o), !r || null === On || Cn || o?.reactions?.includes(n) || (o.reactions ??= []).push(n), o.version > n.version) return !0
            }
        }
        r || Kn(n, p)
    }
    return !1
}

function qn(n) {
    var e = kn, t = An, r = En, l = Cn, o = Mn, i = n.f;
    kn = null, An = 0, En = 0 == (i & (c | s)) ? n : null, Cn = !_n && 0 != (i & d), Mn = n.ctx;
    try {
        var a = (0, n.fn)(), u = n.deps;
        if (null !== kn) {
            var f;
            if (In(n, An), null !== u && An > 0) for (u.length = An + kn.length, f = 0; f < kn.length; f++) u[An + f] = kn[f]; else n.deps = u = kn;
            if (!Cn) for (f = An; f < u.length; f++) (u[f].reactions ??= []).push(n)
        } else null !== u && An < u.length && (In(n, An), u.length = An);
        return a
    } finally {
        kn = e, An = t, En = r, Cn = l, Mn = o
    }
}

function Dn(n, e) {
    let t = e.reactions;
    if (null !== t) {
        var r = t.indexOf(n);
        if (-1 !== r) {
            var l = t.length - 1;
            0 === l ? t = e.reactions = null : (t[r] = t[l], t.pop())
        }
    }
    null !== t || 0 == (e.f & i) || null !== kn && kn.includes(e) || (Kn(e, w), 0 == (e.f & (d | v)) && (e.f ^= v), In(e, 0))
}

function In(n, e) {
    var t = n.deps;
    if (null !== t) for (var r = e; r < t.length; r++) Dn(n, t[r])
}

function Nn(e) {
    var t = e.f;
    if (0 == (t & y)) {
        Kn(e, p);
        var l = On, o = Mn;
        if (On = e, n) {
            var i = Ln;
            Ln = e.component_function
        }
        try {
            0 != (t & f) ? function (n) {
                for (var e = n.first; null !== e;) {
                    var t = e.next;
                    0 == (e.f & c) && fn(e), e = t
                }
            }(e) : un(e), an(e), on(e);
            var a = qn(e);
            e.teardown = "function" == typeof a ? a : null, e.version = jn, n && $n.push(e)
        } catch (t) {
            !function (e, t, l) {
                if (!n || pn.has(e) || null === l) throw e;
                const o = [], i = t.fn?.name;
                i && o.push(i);
                let a = l;
                for (; null !== a;) {
                    if (n) {
                        var u = a.function?.[A];
                        if (u) {
                            const n = u.split("/").pop();
                            o.push(n)
                        }
                    }
                    a = a.p
                }
                const f = /Firefox/.test(navigator.userAgent) ? "  " : "\t";
                r(e, "message", {value: e.message + `\n${o.map((n => `\n${f}in ${n}`)).join("")}\n`});
                const c = e.stack;
                if (c) {
                    const n = c.split("\n"), t = [];
                    for (let e = 0; e < n.length; e++) {
                        const r = n[e];
                        r.includes("svelte/src/internal") || t.push(r)
                    }
                    r(e, "stack", {value: e.stack + t.join("\n")})
                }
                throw pn.add(e), e
            }(t, e, o)
        } finally {
            On = l, n && (Ln = i)
        }
    }
}

function Un() {
    if (xn > 1e3) if (xn = 0, n) try {
        O()
    } catch (n) {
        throw r(n, "stack", {value: ""}), console.error("Last ten effects were: ", $n.slice(-10).map((n => n.fn))), $n = [], n
    } else O();
    xn++
}

function Hn(n) {
    var e = n.length;
    if (0 !== e) {
        Un();
        var t = _n;
        _n = !0;
        try {
            for (var r = 0; r < e; r++) {
                var l = n[r];
                0 == (l.f & p) && (l.f ^= p);
                var o = [];
                Bn(l, o), Rn(o)
            }
        } finally {
            _n = t
        }
    }
}

function Rn(n) {
    var e = n.length;
    if (0 !== e) for (var t = 0; t < e; t++) {
        var r = n[t];
        0 == (r.f & (y | _)) && Pn(r) && (Nn(r), null === r.deps && null === r.first && null === r.nodes_start && (null === r.teardown ? cn(r) : r.fn = null))
    }
}

function Wn() {
    if (wn = !1, xn > 1001) return;
    const e = bn;
    bn = [], Hn(e), wn || (xn = 0, n && ($n = []))
}

function Bn(n, e) {
    var t = n.first, r = [];
    n:for (; null !== t;) {
        var l = t.f, o = 0 != (l & c);
        if (!(o && 0 != (l & p)) && 0 == (l & _)) if (0 != (l & u)) {
            o ? t.f ^= p : Pn(t) && Nn(t);
            var i = t.first;
            if (null !== i) {
                t = i;
                continue
            }
        } else 0 != (l & a) && r.push(t);
        var f = t.next;
        if (null === f) {
            let e = t.parent;
            for (; null !== e;) {
                if (n === e) break n;
                var s = e.next;
                if (null !== s) {
                    t = s;
                    continue n
                }
                e = e.parent
            }
        }
        t = f
    }
    for (var d = 0; d < r.length; d++) i = r[d], e.push(i), Bn(i, e)
}

function Fn(e) {
    var t = hn, r = bn;
    try {
        Un();
        const t = [];
        hn = vn, bn = t, wn = !1, Hn(r);
        var l = e?.();
        return (bn.length > 0 || t.length > 0) && Fn(), xn = 0, n && ($n = []), l
    } finally {
        hn = t, bn = r
    }
}

async function zn() {
    await Promise.resolve(), Fn()
}

function Gn(n) {
    const e = En;
    try {
        return En = null, n()
    } finally {
        En = e
    }
}

const Jn = ~(h | w | p);

function Kn(n, e) {
    n.f = n.f & Jn | e
}

function Qn(e) {
    const t = Zn("getContext").get(e);
    if (n) {
        const n = Mn.function;
        n && H(t, n, !0)
    }
    return t
}

function Vn(n, e) {
    return Zn("setContext").set(n, e), e
}

function Xn(n) {
    return Zn("hasContext").has(n)
}

function Yn() {
    const e = Zn("getAllContexts");
    if (n) {
        const n = Mn?.function;
        if (n) for (const t of e.values()) H(t, n, !0)
    }
    return e
}

function Zn(n) {
    return null === Mn && sn(n), Mn.c ??= new Map(function (n) {
        let e = n.p;
        for (; null !== e;) {
            const n = e.c;
            if (null !== n) return n;
            e = e.p
        }
        return null
    }(Mn) || void 0)
}

if (n) {
    function ne(e) {
        if (!(e in globalThis)) {
            let t;
            Object.defineProperty(globalThis, e, {
                configurable: !0, get: () => {
                    if (void 0 !== t) return t;
                    !function (e) {
                        if (n) {
                            const n = new Error(`rune_outside_svelte\nThe \`${e}\` rune is only available inside \`.svelte\` and \`.svelte.js/ts\` files`);
                            throw n.name = "Svelte error", n
                        }
                        throw new Error("rune_outside_svelte")
                    }(e)
                }, set: n => {
                    t = n
                }
            })
        }
    }

    ne("$state"), ne("$effect"), ne("$derived"), ne("$inspect"), ne("$props"), ne("$bindable")
}
const ee = new Set, te = new Set;

function re(n) {
    var t = this, l = t.ownerDocument, o = n.type, i = n.composedPath?.() || [], a = i[0] || n.target, u = 0,
        f = n.__root;
    if (f) {
        var c = i.indexOf(f);
        if (-1 !== c && (t === document || t === window)) return void (n.__root = t);
        var s = i.indexOf(t);
        if (-1 === s) return;
        c <= s && (u = c)
    }
    if ((a = i[u] || n.target) !== t) {
        r(n, "currentTarget", {configurable: !0, get: () => a || l});
        var d = En, v = On;
        Sn(null), Tn(null);
        try {
            for (var p, h = []; null !== a;) {
                var w = a.assignedSlot || a.parentNode || a.host || null;
                try {
                    var _ = a["__" + o];
                    if (void 0 !== _ && !a.disabled) if (e(_)) {
                        var [y, ...m] = _;
                        y.apply(a, [n, ...m])
                    } else _.call(a, n)
                } catch (n) {
                    p ? h.push(n) : p = n
                }
                if (n.cancelBubble || w === t || null === w) break;
                a = w
            }
            if (p) {
                for (let n of h) queueMicrotask((() => {
                    throw n
                }));
                throw p
            }
        } finally {
            n.__root = t, delete n.currentTarget, Sn(d), Tn(v)
        }
    }
}

function le(n, e) {
    var t = On;
    null === t.nodes_start && (t.nodes_start = n, t.nodes_end = e)
}

const oe = ["touchstart", "touchmove"];

function $$mount(n, e) {
    return $$_mount(n, e)
}

function $$hydrate(e, t) {
    $$init_operations(), t.intro = t.intro ?? !1;
    const r = t.target, l = q, o = P;
    try {
        for (var i = Q(r); i && (8 !== i.nodeType || "[" !== i.data);) i = V(i);
        if (!i) throw k;
        D(!0), I(i), N();
        const n = $$_mount(e, {...t, anchor: i});
        if (null === P || 8 !== P.nodeType || "]" !== P.data) throw M(), k;
        return D(!1), n
    } catch (l) {
        if (l === k) return !1 === t.recover && function () {
            if (n) {
                const n = new Error("hydration_failed\nFailed to hydrate the application");
                throw n.name = "Svelte error", n
            }
            throw new Error("hydration_failed")
        }(), $$init_operations(), r.textContent = "", D(!1), $$mount(e, t);
        throw l
    } finally {
        D(l), I(o)
    }
}

const ue = new Map;

function $$_mount(e, {target: r, anchor: l, props: o = {}, events: i, context: a, intro: f = !0}) {
    $$init_operations();
    var d = new Set, v = n => {
        for (var e = 0; e < n.length; e++) {
            var t = n[e];
            if (!d.has(t)) {
                d.add(t);
                var l = (i = t, oe.includes(i));
                r.addEventListener(t, re, {passive: l});
                var o = ue.get(t);
                void 0 === o ? (document.addEventListener(t, re, {passive: l}), ue.set(t, 1)) : ue.set(t, o + 1)
            }
        }
        var i
    };
    v(t(ee)), te.add(v);
    var p = void 0, h = function (n) {
        const e = rn(s, n, !0);
        return () => {
            fn(e)
        }
    }((() => {
        var t = l ?? r.appendChild(function (n = "") {
            return document.createTextNode(n)
        }());
        return function (n, e = !0) {
            rn(u | c, n, !0, e)
        }((() => {
            a && (!function (e, t = !1, r) {
                var l;
                Mn = {p: Mn, c: null, e: null, m: !1, s: e, x: null, l: null}, t || (Mn.l = {
                    s: null,
                    u: null,
                    r1: [],
                    r2: (l = !1, {f: 0, v: l, reactions: null, equals: S, version: 0})
                }), n && (Mn.function = r, Ln = r)
            }({}), Mn.c = a);
            i && (o.$$events = i), q && le(t, null), p = e(t, o) || {}, q && (On.nodes_end = P), a && function (e) {
                const t = Mn;
                if (null !== t) {
                    void 0 !== e && (t.x = e);
                    const a = t.e;
                    if (null !== a) {
                        var r = On, l = En;
                        t.e = null;
                        try {
                            for (var o = 0; o < a.length; o++) {
                                var i = a[o];
                                Tn(i.effect), Sn(i.reaction), ln(i.fn)
                            }
                        } finally {
                            Tn(r), Sn(l)
                        }
                    }
                    Mn = t.p, n && (Ln = t.p?.function ?? null), t.m = !0
                }
            }()
        })), () => {
            for (var n of d) {
                r.removeEventListener(n, re);
                var e = ue.get(n);
                0 == --e ? (document.removeEventListener(n, re), ue.delete(n)) : ue.set(n, e)
            }
            te.delete(v), ce.delete(p), t !== l && t.parentNode?.removeChild(t)
        }
    }));
    return ce.set(p, h), p
}

let ce = new WeakMap;

function se(e) {
    const t = ce.get(e);
    t ? t() : n && (n ? console.warn("%c[svelte] lifecycle_double_unmount\n%cTried to unmount a component that was not mounted", j, C) : console.warn("lifecycle_double_unmount"))
}

function de(e) {
    return (t, ...r) => {
        var l, o = e(...r);
        if (q) l = P, N(); else {
            var i = function (n) {
                var e = document.createElement("template");
                return e.innerHTML = n, e.content
            }(o.render().trim());
            l = Q(i), !n || null === V(l) && 1 === l.nodeType || (n ? console.warn("%c[svelte] invalid_raw_snippet_render\n%cThe `render` function passed to `createRawSnippet` should return HTML for a single element", j, C) : console.warn("invalid_raw_snippet_render")), t.before(l)
        }
        const a = o.setup?.(l);
        le(l, l), "function" == typeof a && function (n) {
            const e = rn(u, null, !1);
            Kn(e, p), e.teardown = n
        }(a)
    }
}

function ve(e) {
    null === Mn && sn("onMount"), null !== Mn.l ? ye(Mn).m.push(e) : function (e) {
        tn("$effect");
        var t = null !== On && 0 != (On.f & c) && null !== Mn && !Mn.m;
        if (n && r(e, "name", {value: "$effect"}), !t) return ln(e);
        var l = Mn;
        (l.e ??= []).push({fn: e, effect: On, reaction: En})
    }((() => {
        const n = Gn(e);
        if ("function" == typeof n) return n
    }))
}

function pe(n) {
    null === Mn && sn("onDestroy"), ve((() => () => Gn(n)))
}

function he() {
    const n = Mn;
    return null === n && sn("createEventDispatcher"), (t, r, l) => {
        const o = n.s.$$events?.[t];
        if (o) {
            const i = e(o) ? o.slice() : [o], a = function (n, e, {bubbles: t = !1, cancelable: r = !1} = {}) {
                return new CustomEvent(n, {detail: e, bubbles: t, cancelable: r})
            }(t, r, l);
            for (const e of i) e.call(n.x, a);
            return !a.defaultPrevented
        }
        return !0
    }
}

function we(n) {
    null === Mn && sn("beforeUpdate"), null === Mn.l && T("beforeUpdate"), ye(Mn).b.push(n)
}

function _e(n) {
    null === Mn && sn("afterUpdate"), null === Mn.l && T("afterUpdate"), ye(Mn).a.push(n)
}

function ye(n) {
    var e = n.l;
    return e.u ??= {a: [], b: [], m: []}
}

function me(n) {
    Fn(n)
}

export {
    _e as afterUpdate,
    we as beforeUpdate,
    he as createEventDispatcher,
    de as createRawSnippet,
    me as flushSync,
    Yn as getAllContexts,
    Qn as getContext,
    Xn as hasContext,
    $$hydrate as hydrate,
    $$mount as mount,
    pe as onDestroy,
    ve as onMount,
    Vn as setContext,
    zn as tick,
    se as unmount,
    Gn as untrack
};
export default null;
