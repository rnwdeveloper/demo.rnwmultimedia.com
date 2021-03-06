!(function (e) {
    function t(r) {
        if (n[r]) return n[r].exports;
        var i = (n[r] = { i: r, l: !1, exports: {} });
        return e[r].call(i.exports, i, i.exports, t), (i.l = !0), i.exports;
    }
    var n = {};
    (t.m = e),
        (t.c = n),
        (t.i = function (e) {
            return e;
        }),
        (t.d = function (e, n, r) {
            t.o(e, n) || Object.defineProperty(e, n, { configurable: !1, enumerable: !0, get: r });
        }),
        (t.n = function (e) {
            var n =
                e && e.__esModule
                    ? function () {
                          return e.default;
                      }
                    : function () {
                          return e;
                      };
            return t.d(n, "a", n), n;
        }),
        (t.o = function (e, t) {
            return Object.prototype.hasOwnProperty.call(e, t);
        }),
        (t.p = ""),
        t((t.s = 13));
})([
    function (e, t, n) {
        var r, i;
        !(function (t, n) {
            "use strict";
            "object" == typeof e && "object" == typeof e.exports
                ? (e.exports = t.document
                      ? n(t, !0)
                      : function (e) {
                            if (!e.document) throw new Error("jQuery requires a window with a document");
                            return n(e);
                        })
                : n(t);
        })("undefined" != typeof window ? window : this, function (n, o) {
            "use strict";
            function s(e, t, n) {
                t = t || ce;
                var r,
                    i = t.createElement("script");
                if (((i.text = e), n)) for (r in Ee) n[r] && (i[r] = n[r]);
                t.head.appendChild(i).parentNode.removeChild(i);
            }
            function a(e) {
                return null == e ? e + "" : "object" == typeof e || "function" == typeof e ? me[ve.call(e)] || "object" : typeof e;
            }
            function u(e) {
                var t = !!e && "length" in e && e.length,
                    n = a(e);
                return !Te(e) && !ke(e) && ("array" === n || 0 === t || ("number" == typeof t && t > 0 && t - 1 in e));
            }
            function l(e, t) {
                return e.nodeName && e.nodeName.toLowerCase() === t.toLowerCase();
            }
            function c(e, t, n) {
                return Te(t)
                    ? Ce.grep(e, function (e, r) {
                          return !!t.call(e, r, e) !== n;
                      })
                    : t.nodeType
                    ? Ce.grep(e, function (e) {
                          return (e === t) !== n;
                      })
                    : "string" != typeof t
                    ? Ce.grep(e, function (e) {
                          return ge.call(t, e) > -1 !== n;
                      })
                    : Ce.filter(t, e, n);
            }
            function f(e, t) {
                for (; (e = e[t]) && 1 !== e.nodeType; );
                return e;
            }
            function p(e) {
                var t = {};
                return (
                    Ce.each(e.match($e) || [], function (e, n) {
                        t[n] = !0;
                    }),
                    t
                );
            }
            function d(e) {
                return e;
            }
            function h(e) {
                throw e;
            }
            function g(e, t, n, r) {
                var i;
                try {
                    e && Te((i = e.promise)) ? i.call(e).done(t).fail(n) : e && Te((i = e.then)) ? i.call(e, t, n) : t.apply(void 0, [e].slice(r));
                } catch (e) {
                    n.apply(void 0, [e]);
                }
            }
            function m() {
                ce.removeEventListener("DOMContentLoaded", m), n.removeEventListener("load", m), Ce.ready();
            }
            function v(e, t) {
                return t.toUpperCase();
            }
            function y(e) {
                return e.replace(Re, "ms-").replace(ze, v);
            }
            function x() {
                this.expando = Ce.expando + x.uid++;
            }
            function b(e) {
                return "true" === e || ("false" !== e && ("null" === e ? null : e === +e + "" ? +e : Ue.test(e) ? JSON.parse(e) : e));
            }
            function w(e, t, n) {
                var r;
                if (void 0 === n && 1 === e.nodeType)
                    if (((r = "data-" + t.replace(Ve, "-$&").toLowerCase()), "string" == typeof (n = e.getAttribute(r)))) {
                        try {
                            n = b(n);
                        } catch (e) {}
                        We.set(e, t, n);
                    } else n = void 0;
                return n;
            }
            function T(e, t, n, r) {
                var i,
                    o,
                    s = 20,
                    a = r
                        ? function () {
                              return r.cur();
                          }
                        : function () {
                              return Ce.css(e, t, "");
                          },
                    u = a(),
                    l = (n && n[3]) || (Ce.cssNumber[t] ? "" : "px"),
                    c = (Ce.cssNumber[t] || ("px" !== l && +u)) && Xe.exec(Ce.css(e, t));
                if (c && c[3] !== l) {
                    for (u /= 2, l = l || c[3], c = +u || 1; s--; ) Ce.style(e, t, c + l), (1 - o) * (1 - (o = a() / u || 0.5)) <= 0 && (s = 0), (c /= o);
                    (c *= 2), Ce.style(e, t, c + l), (n = n || []);
                }
                return n && ((c = +c || +u || 0), (i = n[1] ? c + (n[1] + 1) * n[2] : +n[2]), r && ((r.unit = l), (r.start = c), (r.end = i))), i;
            }
            function k(e) {
                var t,
                    n = e.ownerDocument,
                    r = e.nodeName,
                    i = Ze[r];
                return i || ((t = n.body.appendChild(n.createElement(r))), (i = Ce.css(t, "display")), t.parentNode.removeChild(t), "none" === i && (i = "block"), (Ze[r] = i), i);
            }
            function E(e, t) {
                for (var n, r, i = [], o = 0, s = e.length; o < s; o++)
                    (r = e[o]),
                        r.style &&
                            ((n = r.style.display),
                            t ? ("none" === n && ((i[o] = _e.get(r, "display") || null), i[o] || (r.style.display = "")), "" === r.style.display && Je(r) && (i[o] = k(r))) : "none" !== n && ((i[o] = "none"), _e.set(r, "display", n)));
                for (o = 0; o < s; o++) null != i[o] && (e[o].style.display = i[o]);
                return e;
            }
            function C(e, t) {
                var n;
                return (n = void 0 !== e.getElementsByTagName ? e.getElementsByTagName(t || "*") : void 0 !== e.querySelectorAll ? e.querySelectorAll(t || "*") : []), void 0 === t || (t && l(e, t)) ? Ce.merge([e], n) : n;
            }
            function A(e, t) {
                for (var n = 0, r = e.length; n < r; n++) _e.set(e[n], "globalEval", !t || _e.get(t[n], "globalEval"));
            }
            function S(e, t, n, r, i) {
                for (var o, s, u, l, c, f, p = t.createDocumentFragment(), d = [], h = 0, g = e.length; h < g; h++)
                    if ((o = e[h]) || 0 === o)
                        if ("object" === a(o)) Ce.merge(d, o.nodeType ? [o] : o);
                        else if (rt.test(o)) {
                            for (s = s || p.appendChild(t.createElement("div")), u = (et.exec(o) || ["", ""])[1].toLowerCase(), l = nt[u] || nt._default, s.innerHTML = l[1] + Ce.htmlPrefilter(o) + l[2], f = l[0]; f--; ) s = s.lastChild;
                            Ce.merge(d, s.childNodes), (s = p.firstChild), (s.textContent = "");
                        } else d.push(t.createTextNode(o));
                for (p.textContent = "", h = 0; (o = d[h++]); )
                    if (r && Ce.inArray(o, r) > -1) i && i.push(o);
                    else if (((c = Ce.contains(o.ownerDocument, o)), (s = C(p.appendChild(o), "script")), c && A(s), n)) for (f = 0; (o = s[f++]); ) tt.test(o.type || "") && n.push(o);
                return p;
            }
            function j() {
                return !0;
            }
            function N() {
                return !1;
            }
            function D() {
                try {
                    return ce.activeElement;
                } catch (e) {}
            }
            function L(e, t, n, r, i, o) {
                var s, a;
                if ("object" == typeof t) {
                    "string" != typeof n && ((r = r || n), (n = void 0));
                    for (a in t) L(e, a, n, r, t[a], o);
                    return e;
                }
                if ((null == r && null == i ? ((i = n), (r = n = void 0)) : null == i && ("string" == typeof n ? ((i = r), (r = void 0)) : ((i = r), (r = n), (n = void 0))), !1 === i)) i = N;
                else if (!i) return e;
                return (
                    1 === o &&
                        ((s = i),
                        (i = function (e) {
                            return Ce().off(e), s.apply(this, arguments);
                        }),
                        (i.guid = s.guid || (s.guid = Ce.guid++))),
                    e.each(function () {
                        Ce.event.add(this, t, i, r, n);
                    })
                );
            }
            function O(e, t) {
                return l(e, "table") && l(11 !== t.nodeType ? t : t.firstChild, "tr") ? Ce(e).children("tbody")[0] || e : e;
            }
            function q(e) {
                return (e.type = (null !== e.getAttribute("type")) + "/" + e.type), e;
            }
            function H(e) {
                return "true/" === (e.type || "").slice(0, 5) ? (e.type = e.type.slice(5)) : e.removeAttribute("type"), e;
            }
            function P(e, t) {
                var n, r, i, o, s, a, u, l;
                if (1 === t.nodeType) {
                    if (_e.hasData(e) && ((o = _e.access(e)), (s = _e.set(t, o)), (l = o.events))) {
                        delete s.handle, (s.events = {});
                        for (i in l) for (n = 0, r = l[i].length; n < r; n++) Ce.event.add(t, i, l[i][n]);
                    }
                    We.hasData(e) && ((a = We.access(e)), (u = Ce.extend({}, a)), We.set(t, u));
                }
            }
            function $(e, t) {
                var n = t.nodeName.toLowerCase();
                "input" === n && Ke.test(e.type) ? (t.checked = e.checked) : ("input" !== n && "textarea" !== n) || (t.defaultValue = e.defaultValue);
            }
            function I(e, t, n, r) {
                t = de.apply([], t);
                var i,
                    o,
                    a,
                    u,
                    l,
                    c,
                    f = 0,
                    p = e.length,
                    d = p - 1,
                    h = t[0],
                    g = Te(h);
                if (g || (p > 1 && "string" == typeof h && !we.checkClone && ct.test(h)))
                    return e.each(function (i) {
                        var o = e.eq(i);
                        g && (t[0] = h.call(this, i, o.html())), I(o, t, n, r);
                    });
                if (p && ((i = S(t, e[0].ownerDocument, !1, e, r)), (o = i.firstChild), 1 === i.childNodes.length && (i = o), o || r)) {
                    for (a = Ce.map(C(i, "script"), q), u = a.length; f < p; f++) (l = i), f !== d && ((l = Ce.clone(l, !0, !0)), u && Ce.merge(a, C(l, "script"))), n.call(e[f], l, f);
                    if (u)
                        for (c = a[a.length - 1].ownerDocument, Ce.map(a, H), f = 0; f < u; f++)
                            (l = a[f]),
                                tt.test(l.type || "") && !_e.access(l, "globalEval") && Ce.contains(c, l) && (l.src && "module" !== (l.type || "").toLowerCase() ? Ce._evalUrl && Ce._evalUrl(l.src) : s(l.textContent.replace(ft, ""), c, l));
                }
                return e;
            }
            function F(e, t, n) {
                for (var r, i = t ? Ce.filter(t, e) : e, o = 0; null != (r = i[o]); o++) n || 1 !== r.nodeType || Ce.cleanData(C(r)), r.parentNode && (n && Ce.contains(r.ownerDocument, r) && A(C(r, "script")), r.parentNode.removeChild(r));
                return e;
            }
            function M(e, t, n) {
                var r,
                    i,
                    o,
                    s,
                    a = e.style;
                return (
                    (n = n || dt(e)),
                    n &&
                        ((s = n.getPropertyValue(t) || n[t]),
                        "" !== s || Ce.contains(e.ownerDocument, e) || (s = Ce.style(e, t)),
                        !we.pixelBoxStyles() && pt.test(s) && ht.test(t) && ((r = a.width), (i = a.minWidth), (o = a.maxWidth), (a.minWidth = a.maxWidth = a.width = s), (s = n.width), (a.width = r), (a.minWidth = i), (a.maxWidth = o))),
                    void 0 !== s ? s + "" : s
                );
            }
            function R(e, t) {
                return {
                    get: function () {
                        return e() ? void delete this.get : (this.get = t).apply(this, arguments);
                    },
                };
            }
            function z(e) {
                if (e in bt) return e;
                for (var t = e[0].toUpperCase() + e.slice(1), n = xt.length; n--; ) if ((e = xt[n] + t) in bt) return e;
            }
            function B(e) {
                var t = Ce.cssProps[e];
                return t || (t = Ce.cssProps[e] = z(e) || e), t;
            }
            function _(e, t, n) {
                var r = Xe.exec(t);
                return r ? Math.max(0, r[2] - (n || 0)) + (r[3] || "px") : t;
            }
            function W(e, t, n, r, i, o) {
                var s = "width" === t ? 1 : 0,
                    a = 0,
                    u = 0;
                if (n === (r ? "border" : "content")) return 0;
                for (; s < 4; s += 2)
                    "margin" === n && (u += Ce.css(e, n + Ge[s], !0, i)),
                        r
                            ? ("content" === n && (u -= Ce.css(e, "padding" + Ge[s], !0, i)), "margin" !== n && (u -= Ce.css(e, "border" + Ge[s] + "Width", !0, i)))
                            : ((u += Ce.css(e, "padding" + Ge[s], !0, i)), "padding" !== n ? (u += Ce.css(e, "border" + Ge[s] + "Width", !0, i)) : (a += Ce.css(e, "border" + Ge[s] + "Width", !0, i)));
                return !r && o >= 0 && (u += Math.max(0, Math.ceil(e["offset" + t[0].toUpperCase() + t.slice(1)] - o - u - a - 0.5))), u;
            }
            function U(e, t, n) {
                var r = dt(e),
                    i = M(e, t, r),
                    o = "border-box" === Ce.css(e, "boxSizing", !1, r),
                    s = o;
                if (pt.test(i)) {
                    if (!n) return i;
                    i = "auto";
                }
                return (
                    (s = s && (we.boxSizingReliable() || i === e.style[t])),
                    ("auto" === i || (!parseFloat(i) && "inline" === Ce.css(e, "display", !1, r))) && ((i = e["offset" + t[0].toUpperCase() + t.slice(1)]), (s = !0)),
                    (i = parseFloat(i) || 0) + W(e, t, n || (o ? "border" : "content"), s, r, i) + "px"
                );
            }
            function V(e, t, n, r, i) {
                return new V.prototype.init(e, t, n, r, i);
            }
            function Y() {
                Tt && (!1 === ce.hidden && n.requestAnimationFrame ? n.requestAnimationFrame(Y) : n.setTimeout(Y, Ce.fx.interval), Ce.fx.tick());
            }
            function X() {
                return (
                    n.setTimeout(function () {
                        wt = void 0;
                    }),
                    (wt = Date.now())
                );
            }
            function G(e, t) {
                var n,
                    r = 0,
                    i = { height: e };
                for (t = t ? 1 : 0; r < 4; r += 2 - t) (n = Ge[r]), (i["margin" + n] = i["padding" + n] = e);
                return t && (i.opacity = i.width = e), i;
            }
            function J(e, t, n) {
                for (var r, i = (K.tweeners[t] || []).concat(K.tweeners["*"]), o = 0, s = i.length; o < s; o++) if ((r = i[o].call(n, t, e))) return r;
            }
            function Q(e, t, n) {
                var r,
                    i,
                    o,
                    s,
                    a,
                    u,
                    l,
                    c,
                    f = "width" in t || "height" in t,
                    p = this,
                    d = {},
                    h = e.style,
                    g = e.nodeType && Je(e),
                    m = _e.get(e, "fxshow");
                n.queue ||
                    ((s = Ce._queueHooks(e, "fx")),
                    null == s.unqueued &&
                        ((s.unqueued = 0),
                        (a = s.empty.fire),
                        (s.empty.fire = function () {
                            s.unqueued || a();
                        })),
                    s.unqueued++,
                    p.always(function () {
                        p.always(function () {
                            s.unqueued--, Ce.queue(e, "fx").length || s.empty.fire();
                        });
                    }));
                for (r in t)
                    if (((i = t[r]), kt.test(i))) {
                        if ((delete t[r], (o = o || "toggle" === i), i === (g ? "hide" : "show"))) {
                            if ("show" !== i || !m || void 0 === m[r]) continue;
                            g = !0;
                        }
                        d[r] = (m && m[r]) || Ce.style(e, r);
                    }
                if ((u = !Ce.isEmptyObject(t)) || !Ce.isEmptyObject(d)) {
                    f &&
                        1 === e.nodeType &&
                        ((n.overflow = [h.overflow, h.overflowX, h.overflowY]),
                        (l = m && m.display),
                        null == l && (l = _e.get(e, "display")),
                        (c = Ce.css(e, "display")),
                        "none" === c && (l ? (c = l) : (E([e], !0), (l = e.style.display || l), (c = Ce.css(e, "display")), E([e]))),
                        ("inline" === c || ("inline-block" === c && null != l)) &&
                            "none" === Ce.css(e, "float") &&
                            (u ||
                                (p.done(function () {
                                    h.display = l;
                                }),
                                null == l && ((c = h.display), (l = "none" === c ? "" : c))),
                            (h.display = "inline-block"))),
                        n.overflow &&
                            ((h.overflow = "hidden"),
                            p.always(function () {
                                (h.overflow = n.overflow[0]), (h.overflowX = n.overflow[1]), (h.overflowY = n.overflow[2]);
                            })),
                        (u = !1);
                    for (r in d)
                        u ||
                            (m ? "hidden" in m && (g = m.hidden) : (m = _e.access(e, "fxshow", { display: l })),
                            o && (m.hidden = !g),
                            g && E([e], !0),
                            p.done(function () {
                                g || E([e]), _e.remove(e, "fxshow");
                                for (r in d) Ce.style(e, r, d[r]);
                            })),
                            (u = J(g ? m[r] : 0, r, p)),
                            r in m || ((m[r] = u.start), g && ((u.end = u.start), (u.start = 0)));
                }
            }
            function Z(e, t) {
                var n, r, i, o, s;
                for (n in e)
                    if (((r = y(n)), (i = t[r]), (o = e[n]), Array.isArray(o) && ((i = o[1]), (o = e[n] = o[0])), n !== r && ((e[r] = o), delete e[n]), (s = Ce.cssHooks[r]) && "expand" in s)) {
                        (o = s.expand(o)), delete e[r];
                        for (n in o) n in e || ((e[n] = o[n]), (t[n] = i));
                    } else t[r] = i;
            }
            function K(e, t, n) {
                var r,
                    i,
                    o = 0,
                    s = K.prefilters.length,
                    a = Ce.Deferred().always(function () {
                        delete u.elem;
                    }),
                    u = function () {
                        if (i) return !1;
                        for (var t = wt || X(), n = Math.max(0, l.startTime + l.duration - t), r = n / l.duration || 0, o = 1 - r, s = 0, u = l.tweens.length; s < u; s++) l.tweens[s].run(o);
                        return a.notifyWith(e, [l, o, n]), o < 1 && u ? n : (u || a.notifyWith(e, [l, 1, 0]), a.resolveWith(e, [l]), !1);
                    },
                    l = a.promise({
                        elem: e,
                        props: Ce.extend({}, t),
                        opts: Ce.extend(!0, { specialEasing: {}, easing: Ce.easing._default }, n),
                        originalProperties: t,
                        originalOptions: n,
                        startTime: wt || X(),
                        duration: n.duration,
                        tweens: [],
                        createTween: function (t, n) {
                            var r = Ce.Tween(e, l.opts, t, n, l.opts.specialEasing[t] || l.opts.easing);
                            return l.tweens.push(r), r;
                        },
                        stop: function (t) {
                            var n = 0,
                                r = t ? l.tweens.length : 0;
                            if (i) return this;
                            for (i = !0; n < r; n++) l.tweens[n].run(1);
                            return t ? (a.notifyWith(e, [l, 1, 0]), a.resolveWith(e, [l, t])) : a.rejectWith(e, [l, t]), this;
                        },
                    }),
                    c = l.props;
                for (Z(c, l.opts.specialEasing); o < s; o++) if ((r = K.prefilters[o].call(l, e, c, l.opts))) return Te(r.stop) && (Ce._queueHooks(l.elem, l.opts.queue).stop = r.stop.bind(r)), r;
                return (
                    Ce.map(c, J, l),
                    Te(l.opts.start) && l.opts.start.call(e, l),
                    l.progress(l.opts.progress).done(l.opts.done, l.opts.complete).fail(l.opts.fail).always(l.opts.always),
                    Ce.fx.timer(Ce.extend(u, { elem: e, anim: l, queue: l.opts.queue })),
                    l
                );
            }
            function ee(e) {
                return (e.match($e) || []).join(" ");
            }
            function te(e) {
                return (e.getAttribute && e.getAttribute("class")) || "";
            }
            function ne(e) {
                return Array.isArray(e) ? e : "string" == typeof e ? e.match($e) || [] : [];
            }
            function re(e, t, n, r) {
                var i;
                if (Array.isArray(t))
                    Ce.each(t, function (t, i) {
                        n || Pt.test(e) ? r(e, i) : re(e + "[" + ("object" == typeof i && null != i ? t : "") + "]", i, n, r);
                    });
                else if (n || "object" !== a(t)) r(e, t);
                else for (i in t) re(e + "[" + i + "]", t[i], n, r);
            }
            function ie(e) {
                return function (t, n) {
                    "string" != typeof t && ((n = t), (t = "*"));
                    var r,
                        i = 0,
                        o = t.toLowerCase().match($e) || [];
                    if (Te(n)) for (; (r = o[i++]); ) "+" === r[0] ? ((r = r.slice(1) || "*"), (e[r] = e[r] || []).unshift(n)) : (e[r] = e[r] || []).push(n);
                };
            }
            function oe(e, t, n, r) {
                function i(a) {
                    var u;
                    return (
                        (o[a] = !0),
                        Ce.each(e[a] || [], function (e, a) {
                            var l = a(t, n, r);
                            return "string" != typeof l || s || o[l] ? (s ? !(u = l) : void 0) : (t.dataTypes.unshift(l), i(l), !1);
                        }),
                        u
                    );
                }
                var o = {},
                    s = e === Yt;
                return i(t.dataTypes[0]) || (!o["*"] && i("*"));
            }
            function se(e, t) {
                var n,
                    r,
                    i = Ce.ajaxSettings.flatOptions || {};
                for (n in t) void 0 !== t[n] && ((i[n] ? e : r || (r = {}))[n] = t[n]);
                return r && Ce.extend(!0, e, r), e;
            }
            function ae(e, t, n) {
                for (var r, i, o, s, a = e.contents, u = e.dataTypes; "*" === u[0]; ) u.shift(), void 0 === r && (r = e.mimeType || t.getResponseHeader("Content-Type"));
                if (r)
                    for (i in a)
                        if (a[i] && a[i].test(r)) {
                            u.unshift(i);
                            break;
                        }
                if (u[0] in n) o = u[0];
                else {
                    for (i in n) {
                        if (!u[0] || e.converters[i + " " + u[0]]) {
                            o = i;
                            break;
                        }
                        s || (s = i);
                    }
                    o = o || s;
                }
                if (o) return o !== u[0] && u.unshift(o), n[o];
            }
            function ue(e, t, n, r) {
                var i,
                    o,
                    s,
                    a,
                    u,
                    l = {},
                    c = e.dataTypes.slice();
                if (c[1]) for (s in e.converters) l[s.toLowerCase()] = e.converters[s];
                for (o = c.shift(); o; )
                    if ((e.responseFields[o] && (n[e.responseFields[o]] = t), !u && r && e.dataFilter && (t = e.dataFilter(t, e.dataType)), (u = o), (o = c.shift())))
                        if ("*" === o) o = u;
                        else if ("*" !== u && u !== o) {
                            if (!(s = l[u + " " + o] || l["* " + o]))
                                for (i in l)
                                    if (((a = i.split(" ")), a[1] === o && (s = l[u + " " + a[0]] || l["* " + a[0]]))) {
                                        !0 === s ? (s = l[i]) : !0 !== l[i] && ((o = a[0]), c.unshift(a[1]));
                                        break;
                                    }
                            if (!0 !== s)
                                if (s && e.throws) t = s(t);
                                else
                                    try {
                                        t = s(t);
                                    } catch (e) {
                                        return { state: "parsererror", error: s ? e : "No conversion from " + u + " to " + o };
                                    }
                        }
                return { state: "success", data: t };
            }
            var le = [],
                ce = n.document,
                fe = Object.getPrototypeOf,
                pe = le.slice,
                de = le.concat,
                he = le.push,
                ge = le.indexOf,
                me = {},
                ve = me.toString,
                ye = me.hasOwnProperty,
                xe = ye.toString,
                be = xe.call(Object),
                we = {},
                Te = function (e) {
                    return "function" == typeof e && "number" != typeof e.nodeType;
                },
                ke = function (e) {
                    return null != e && e === e.window;
                },
                Ee = { type: !0, src: !0, noModule: !0 },
                Ce = function (e, t) {
                    return new Ce.fn.init(e, t);
                },
                Ae = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
            (Ce.fn = Ce.prototype = {
                jquery: "3.3.1",
                constructor: Ce,
                length: 0,
                toArray: function () {
                    return pe.call(this);
                },
                get: function (e) {
                    return null == e ? pe.call(this) : e < 0 ? this[e + this.length] : this[e];
                },
                pushStack: function (e) {
                    var t = Ce.merge(this.constructor(), e);
                    return (t.prevObject = this), t;
                },
                each: function (e) {
                    return Ce.each(this, e);
                },
                map: function (e) {
                    return this.pushStack(
                        Ce.map(this, function (t, n) {
                            return e.call(t, n, t);
                        })
                    );
                },
                slice: function () {
                    return this.pushStack(pe.apply(this, arguments));
                },
                first: function () {
                    return this.eq(0);
                },
                last: function () {
                    return this.eq(-1);
                },
                eq: function (e) {
                    var t = this.length,
                        n = +e + (e < 0 ? t : 0);
                    return this.pushStack(n >= 0 && n < t ? [this[n]] : []);
                },
                end: function () {
                    return this.prevObject || this.constructor();
                },
                push: he,
                sort: le.sort,
                splice: le.splice,
            }),
                (Ce.extend = Ce.fn.extend = function () {
                    var e,
                        t,
                        n,
                        r,
                        i,
                        o,
                        s = arguments[0] || {},
                        a = 1,
                        u = arguments.length,
                        l = !1;
                    for ("boolean" == typeof s && ((l = s), (s = arguments[a] || {}), a++), "object" == typeof s || Te(s) || (s = {}), a === u && ((s = this), a--); a < u; a++)
                        if (null != (e = arguments[a]))
                            for (t in e)
                                (n = s[t]),
                                    (r = e[t]),
                                    s !== r &&
                                        (l && r && (Ce.isPlainObject(r) || (i = Array.isArray(r)))
                                            ? (i ? ((i = !1), (o = n && Array.isArray(n) ? n : [])) : (o = n && Ce.isPlainObject(n) ? n : {}), (s[t] = Ce.extend(l, o, r)))
                                            : void 0 !== r && (s[t] = r));
                    return s;
                }),
                Ce.extend({
                    expando: "jQuery" + ("3.3.1" + Math.random()).replace(/\D/g, ""),
                    isReady: !0,
                    error: function (e) {
                        throw new Error(e);
                    },
                    noop: function () {},
                    isPlainObject: function (e) {
                        var t, n;
                        return !(!e || "[object Object]" !== ve.call(e)) && (!(t = fe(e)) || ("function" == typeof (n = ye.call(t, "constructor") && t.constructor) && xe.call(n) === be));
                    },
                    isEmptyObject: function (e) {
                        var t;
                        for (t in e) return !1;
                        return !0;
                    },
                    globalEval: function (e) {
                        s(e);
                    },
                    each: function (e, t) {
                        var n,
                            r = 0;
                        if (u(e)) for (n = e.length; r < n && !1 !== t.call(e[r], r, e[r]); r++);
                        else for (r in e) if (!1 === t.call(e[r], r, e[r])) break;
                        return e;
                    },
                    trim: function (e) {
                        return null == e ? "" : (e + "").replace(Ae, "");
                    },
                    makeArray: function (e, t) {
                        var n = t || [];
                        return null != e && (u(Object(e)) ? Ce.merge(n, "string" == typeof e ? [e] : e) : he.call(n, e)), n;
                    },
                    inArray: function (e, t, n) {
                        return null == t ? -1 : ge.call(t, e, n);
                    },
                    merge: function (e, t) {
                        for (var n = +t.length, r = 0, i = e.length; r < n; r++) e[i++] = t[r];
                        return (e.length = i), e;
                    },
                    grep: function (e, t, n) {
                        for (var r = [], i = 0, o = e.length, s = !n; i < o; i++) !t(e[i], i) !== s && r.push(e[i]);
                        return r;
                    },
                    map: function (e, t, n) {
                        var r,
                            i,
                            o = 0,
                            s = [];
                        if (u(e)) for (r = e.length; o < r; o++) null != (i = t(e[o], o, n)) && s.push(i);
                        else for (o in e) null != (i = t(e[o], o, n)) && s.push(i);
                        return de.apply([], s);
                    },
                    guid: 1,
                    support: we,
                }),
                "function" == typeof Symbol && (Ce.fn[Symbol.iterator] = le[Symbol.iterator]),
                Ce.each("Boolean Number String Function Array Date RegExp Object Error Symbol".split(" "), function (e, t) {
                    me["[object " + t + "]"] = t.toLowerCase();
                });
            var Se = (function (e) {
                function t(e, t, n, r) {
                    var i,
                        o,
                        s,
                        a,
                        u,
                        c,
                        p,
                        d = t && t.ownerDocument,
                        h = t ? t.nodeType : 9;
                    if (((n = n || []), "string" != typeof e || !e || (1 !== h && 9 !== h && 11 !== h))) return n;
                    if (!r && ((t ? t.ownerDocument || t : M) !== L && D(t), (t = t || L), q)) {
                        if (11 !== h && (u = ge.exec(e)))
                            if ((i = u[1])) {
                                if (9 === h) {
                                    if (!(s = t.getElementById(i))) return n;
                                    if (s.id === i) return n.push(s), n;
                                } else if (d && (s = d.getElementById(i)) && I(t, s) && s.id === i) return n.push(s), n;
                            } else {
                                if (u[2]) return J.apply(n, t.getElementsByTagName(e)), n;
                                if ((i = u[3]) && b.getElementsByClassName && t.getElementsByClassName) return J.apply(n, t.getElementsByClassName(i)), n;
                            }
                        if (b.qsa && !W[e + " "] && (!H || !H.test(e))) {
                            if (1 !== h) (d = t), (p = e);
                            else if ("object" !== t.nodeName.toLowerCase()) {
                                for ((a = t.getAttribute("id")) ? (a = a.replace(xe, be)) : t.setAttribute("id", (a = F)), c = E(e), o = c.length; o--; ) c[o] = "#" + a + " " + f(c[o]);
                                (p = c.join(",")), (d = (me.test(e) && l(t.parentNode)) || t);
                            }
                            if (p)
                                try {
                                    return J.apply(n, d.querySelectorAll(p)), n;
                                } catch (e) {
                                } finally {
                                    a === F && t.removeAttribute("id");
                                }
                        }
                    }
                    return A(e.replace(oe, "$1"), t, n, r);
                }
                function n() {
                    function e(n, r) {
                        return t.push(n + " ") > w.cacheLength && delete e[t.shift()], (e[n + " "] = r);
                    }
                    var t = [];
                    return e;
                }
                function r(e) {
                    return (e[F] = !0), e;
                }
                function i(e) {
                    var t = L.createElement("fieldset");
                    try {
                        return !!e(t);
                    } catch (e) {
                        return !1;
                    } finally {
                        t.parentNode && t.parentNode.removeChild(t), (t = null);
                    }
                }
                function o(e, t) {
                    for (var n = e.split("|"), r = n.length; r--; ) w.attrHandle[n[r]] = t;
                }
                function s(e, t) {
                    var n = t && e,
                        r = n && 1 === e.nodeType && 1 === t.nodeType && e.sourceIndex - t.sourceIndex;
                    if (r) return r;
                    if (n) for (; (n = n.nextSibling); ) if (n === t) return -1;
                    return e ? 1 : -1;
                }
                function a(e) {
                    return function (t) {
                        return "form" in t
                            ? t.parentNode && !1 === t.disabled
                                ? "label" in t
                                    ? "label" in t.parentNode
                                        ? t.parentNode.disabled === e
                                        : t.disabled === e
                                    : t.isDisabled === e || (t.isDisabled !== !e && Te(t) === e)
                                : t.disabled === e
                            : "label" in t && t.disabled === e;
                    };
                }
                function u(e) {
                    return r(function (t) {
                        return (
                            (t = +t),
                            r(function (n, r) {
                                for (var i, o = e([], n.length, t), s = o.length; s--; ) n[(i = o[s])] && (n[i] = !(r[i] = n[i]));
                            })
                        );
                    });
                }
                function l(e) {
                    return e && void 0 !== e.getElementsByTagName && e;
                }
                function c() {}
                function f(e) {
                    for (var t = 0, n = e.length, r = ""; t < n; t++) r += e[t].value;
                    return r;
                }
                function p(e, t, n) {
                    var r = t.dir,
                        i = t.next,
                        o = i || r,
                        s = n && "parentNode" === o,
                        a = z++;
                    return t.first
                        ? function (t, n, i) {
                              for (; (t = t[r]); ) if (1 === t.nodeType || s) return e(t, n, i);
                              return !1;
                          }
                        : function (t, n, u) {
                              var l,
                                  c,
                                  f,
                                  p = [R, a];
                              if (u) {
                                  for (; (t = t[r]); ) if ((1 === t.nodeType || s) && e(t, n, u)) return !0;
                              } else
                                  for (; (t = t[r]); )
                                      if (1 === t.nodeType || s)
                                          if (((f = t[F] || (t[F] = {})), (c = f[t.uniqueID] || (f[t.uniqueID] = {})), i && i === t.nodeName.toLowerCase())) t = t[r] || t;
                                          else {
                                              if ((l = c[o]) && l[0] === R && l[1] === a) return (p[2] = l[2]);
                                              if (((c[o] = p), (p[2] = e(t, n, u)))) return !0;
                                          }
                              return !1;
                          };
                }
                function d(e) {
                    return e.length > 1
                        ? function (t, n, r) {
                              for (var i = e.length; i--; ) if (!e[i](t, n, r)) return !1;
                              return !0;
                          }
                        : e[0];
                }
                function h(e, n, r) {
                    for (var i = 0, o = n.length; i < o; i++) t(e, n[i], r);
                    return r;
                }
                function g(e, t, n, r, i) {
                    for (var o, s = [], a = 0, u = e.length, l = null != t; a < u; a++) (o = e[a]) && ((n && !n(o, r, i)) || (s.push(o), l && t.push(a)));
                    return s;
                }
                function m(e, t, n, i, o, s) {
                    return (
                        i && !i[F] && (i = m(i)),
                        o && !o[F] && (o = m(o, s)),
                        r(function (r, s, a, u) {
                            var l,
                                c,
                                f,
                                p = [],
                                d = [],
                                m = s.length,
                                v = r || h(t || "*", a.nodeType ? [a] : a, []),
                                y = !e || (!r && t) ? v : g(v, p, e, a, u),
                                x = n ? (o || (r ? e : m || i) ? [] : s) : y;
                            if ((n && n(y, x, a, u), i)) for (l = g(x, d), i(l, [], a, u), c = l.length; c--; ) (f = l[c]) && (x[d[c]] = !(y[d[c]] = f));
                            if (r) {
                                if (o || e) {
                                    if (o) {
                                        for (l = [], c = x.length; c--; ) (f = x[c]) && l.push((y[c] = f));
                                        o(null, (x = []), l, u);
                                    }
                                    for (c = x.length; c--; ) (f = x[c]) && (l = o ? Z(r, f) : p[c]) > -1 && (r[l] = !(s[l] = f));
                                }
                            } else (x = g(x === s ? x.splice(m, x.length) : x)), o ? o(null, s, x, u) : J.apply(s, x);
                        })
                    );
                }
                function v(e) {
                    for (
                        var t,
                            n,
                            r,
                            i = e.length,
                            o = w.relative[e[0].type],
                            s = o || w.relative[" "],
                            a = o ? 1 : 0,
                            u = p(
                                function (e) {
                                    return e === t;
                                },
                                s,
                                !0
                            ),
                            l = p(
                                function (e) {
                                    return Z(t, e) > -1;
                                },
                                s,
                                !0
                            ),
                            c = [
                                function (e, n, r) {
                                    var i = (!o && (r || n !== S)) || ((t = n).nodeType ? u(e, n, r) : l(e, n, r));
                                    return (t = null), i;
                                },
                            ];
                        a < i;
                        a++
                    )
                        if ((n = w.relative[e[a].type])) c = [p(d(c), n)];
                        else {
                            if (((n = w.filter[e[a].type].apply(null, e[a].matches)), n[F])) {
                                for (r = ++a; r < i && !w.relative[e[r].type]; r++);
                                return m(a > 1 && d(c), a > 1 && f(e.slice(0, a - 1).concat({ value: " " === e[a - 2].type ? "*" : "" })).replace(oe, "$1"), n, a < r && v(e.slice(a, r)), r < i && v((e = e.slice(r))), r < i && f(e));
                            }
                            c.push(n);
                        }
                    return d(c);
                }
                function y(e, n) {
                    var i = n.length > 0,
                        o = e.length > 0,
                        s = function (r, s, a, u, l) {
                            var c,
                                f,
                                p,
                                d = 0,
                                h = "0",
                                m = r && [],
                                v = [],
                                y = S,
                                x = r || (o && w.find.TAG("*", l)),
                                b = (R += null == y ? 1 : Math.random() || 0.1),
                                T = x.length;
                            for (l && (S = s === L || s || l); h !== T && null != (c = x[h]); h++) {
                                if (o && c) {
                                    for (f = 0, s || c.ownerDocument === L || (D(c), (a = !q)); (p = e[f++]); )
                                        if (p(c, s || L, a)) {
                                            u.push(c);
                                            break;
                                        }
                                    l && (R = b);
                                }
                                i && ((c = !p && c) && d--, r && m.push(c));
                            }
                            if (((d += h), i && h !== d)) {
                                for (f = 0; (p = n[f++]); ) p(m, v, s, a);
                                if (r) {
                                    if (d > 0) for (; h--; ) m[h] || v[h] || (v[h] = X.call(u));
                                    v = g(v);
                                }
                                J.apply(u, v), l && !r && v.length > 0 && d + n.length > 1 && t.uniqueSort(u);
                            }
                            return l && ((R = b), (S = y)), m;
                        };
                    return i ? r(s) : s;
                }
                var x,
                    b,
                    w,
                    T,
                    k,
                    E,
                    C,
                    A,
                    S,
                    j,
                    N,
                    D,
                    L,
                    O,
                    q,
                    H,
                    P,
                    $,
                    I,
                    F = "sizzle" + 1 * new Date(),
                    M = e.document,
                    R = 0,
                    z = 0,
                    B = n(),
                    _ = n(),
                    W = n(),
                    U = function (e, t) {
                        return e === t && (N = !0), 0;
                    },
                    V = {}.hasOwnProperty,
                    Y = [],
                    X = Y.pop,
                    G = Y.push,
                    J = Y.push,
                    Q = Y.slice,
                    Z = function (e, t) {
                        for (var n = 0, r = e.length; n < r; n++) if (e[n] === t) return n;
                        return -1;
                    },
                    K = "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",
                    ee = "[\\x20\\t\\r\\n\\f]",
                    te = "(?:\\\\.|[\\w-]|[^\0-\\xa0])+",
                    ne = "\\[" + ee + "*(" + te + ")(?:" + ee + "*([*^$|!~]?=)" + ee + "*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|(" + te + "))|)" + ee + "*\\]",
                    re = ":(" + te + ")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|" + ne + ")*)|.*)\\)|)",
                    ie = new RegExp(ee + "+", "g"),
                    oe = new RegExp("^" + ee + "+|((?:^|[^\\\\])(?:\\\\.)*)" + ee + "+$", "g"),
                    se = new RegExp("^" + ee + "*," + ee + "*"),
                    ae = new RegExp("^" + ee + "*([>+~]|" + ee + ")" + ee + "*"),
                    ue = new RegExp("=" + ee + "*([^\\]'\"]*?)" + ee + "*\\]", "g"),
                    le = new RegExp(re),
                    ce = new RegExp("^" + te + "$"),
                    fe = {
                        ID: new RegExp("^#(" + te + ")"),
                        CLASS: new RegExp("^\\.(" + te + ")"),
                        TAG: new RegExp("^(" + te + "|[*])"),
                        ATTR: new RegExp("^" + ne),
                        PSEUDO: new RegExp("^" + re),
                        CHILD: new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" + ee + "*(even|odd|(([+-]|)(\\d*)n|)" + ee + "*(?:([+-]|)" + ee + "*(\\d+)|))" + ee + "*\\)|)", "i"),
                        bool: new RegExp("^(?:" + K + ")$", "i"),
                        needsContext: new RegExp("^" + ee + "*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" + ee + "*((?:-\\d)?\\d*)" + ee + "*\\)|)(?=[^-]|$)", "i"),
                    },
                    pe = /^(?:input|select|textarea|button)$/i,
                    de = /^h\d$/i,
                    he = /^[^{]+\{\s*\[native \w/,
                    ge = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,
                    me = /[+~]/,
                    ve = new RegExp("\\\\([\\da-f]{1,6}" + ee + "?|(" + ee + ")|.)", "ig"),
                    ye = function (e, t, n) {
                        var r = "0x" + t - 65536;
                        return r !== r || n ? t : r < 0 ? String.fromCharCode(r + 65536) : String.fromCharCode((r >> 10) | 55296, (1023 & r) | 56320);
                    },
                    xe = /([\0-\x1f\x7f]|^-?\d)|^-$|[^\0-\x1f\x7f-\uFFFF\w-]/g,
                    be = function (e, t) {
                        return t ? ("\0" === e ? "???" : e.slice(0, -1) + "\\" + e.charCodeAt(e.length - 1).toString(16) + " ") : "\\" + e;
                    },
                    we = function () {
                        D();
                    },
                    Te = p(
                        function (e) {
                            return !0 === e.disabled && ("form" in e || "label" in e);
                        },
                        { dir: "parentNode", next: "legend" }
                    );
                try {
                    J.apply((Y = Q.call(M.childNodes)), M.childNodes), Y[M.childNodes.length].nodeType;
                } catch (e) {
                    J = {
                        apply: Y.length
                            ? function (e, t) {
                                  G.apply(e, Q.call(t));
                              }
                            : function (e, t) {
                                  for (var n = e.length, r = 0; (e[n++] = t[r++]); );
                                  e.length = n - 1;
                              },
                    };
                }
                (b = t.support = {}),
                    (k = t.isXML = function (e) {
                        var t = e && (e.ownerDocument || e).documentElement;
                        return !!t && "HTML" !== t.nodeName;
                    }),
                    (D = t.setDocument = function (e) {
                        var t,
                            n,
                            r = e ? e.ownerDocument || e : M;
                        return r !== L && 9 === r.nodeType && r.documentElement
                            ? ((L = r),
                              (O = L.documentElement),
                              (q = !k(L)),
                              M !== L && (n = L.defaultView) && n.top !== n && (n.addEventListener ? n.addEventListener("unload", we, !1) : n.attachEvent && n.attachEvent("onunload", we)),
                              (b.attributes = i(function (e) {
                                  return (e.className = "i"), !e.getAttribute("className");
                              })),
                              (b.getElementsByTagName = i(function (e) {
                                  return e.appendChild(L.createComment("")), !e.getElementsByTagName("*").length;
                              })),
                              (b.getElementsByClassName = he.test(L.getElementsByClassName)),
                              (b.getById = i(function (e) {
                                  return (O.appendChild(e).id = F), !L.getElementsByName || !L.getElementsByName(F).length;
                              })),
                              b.getById
                                  ? ((w.filter.ID = function (e) {
                                        var t = e.replace(ve, ye);
                                        return function (e) {
                                            return e.getAttribute("id") === t;
                                        };
                                    }),
                                    (w.find.ID = function (e, t) {
                                        if (void 0 !== t.getElementById && q) {
                                            var n = t.getElementById(e);
                                            return n ? [n] : [];
                                        }
                                    }))
                                  : ((w.filter.ID = function (e) {
                                        var t = e.replace(ve, ye);
                                        return function (e) {
                                            var n = void 0 !== e.getAttributeNode && e.getAttributeNode("id");
                                            return n && n.value === t;
                                        };
                                    }),
                                    (w.find.ID = function (e, t) {
                                        if (void 0 !== t.getElementById && q) {
                                            var n,
                                                r,
                                                i,
                                                o = t.getElementById(e);
                                            if (o) {
                                                if ((n = o.getAttributeNode("id")) && n.value === e) return [o];
                                                for (i = t.getElementsByName(e), r = 0; (o = i[r++]); ) if ((n = o.getAttributeNode("id")) && n.value === e) return [o];
                                            }
                                            return [];
                                        }
                                    })),
                              (w.find.TAG = b.getElementsByTagName
                                  ? function (e, t) {
                                        return void 0 !== t.getElementsByTagName ? t.getElementsByTagName(e) : b.qsa ? t.querySelectorAll(e) : void 0;
                                    }
                                  : function (e, t) {
                                        var n,
                                            r = [],
                                            i = 0,
                                            o = t.getElementsByTagName(e);
                                        if ("*" === e) {
                                            for (; (n = o[i++]); ) 1 === n.nodeType && r.push(n);
                                            return r;
                                        }
                                        return o;
                                    }),
                              (w.find.CLASS =
                                  b.getElementsByClassName &&
                                  function (e, t) {
                                      if (void 0 !== t.getElementsByClassName && q) return t.getElementsByClassName(e);
                                  }),
                              (P = []),
                              (H = []),
                              (b.qsa = he.test(L.querySelectorAll)) &&
                                  (i(function (e) {
                                      (O.appendChild(e).innerHTML = "<a id='" + F + "'></a><select id='" + F + "-\r\\' msallowcapture=''><option selected=''></option></select>"),
                                          e.querySelectorAll("[msallowcapture^='']").length && H.push("[*^$]=" + ee + "*(?:''|\"\")"),
                                          e.querySelectorAll("[selected]").length || H.push("\\[" + ee + "*(?:value|" + K + ")"),
                                          e.querySelectorAll("[id~=" + F + "-]").length || H.push("~="),
                                          e.querySelectorAll(":checked").length || H.push(":checked"),
                                          e.querySelectorAll("a#" + F + "+*").length || H.push(".#.+[+~]");
                                  }),
                                  i(function (e) {
                                      e.innerHTML = "<a href='' disabled='disabled'></a><select disabled='disabled'><option/></select>";
                                      var t = L.createElement("input");
                                      t.setAttribute("type", "hidden"),
                                          e.appendChild(t).setAttribute("name", "D"),
                                          e.querySelectorAll("[name=d]").length && H.push("name" + ee + "*[*^$|!~]?="),
                                          2 !== e.querySelectorAll(":enabled").length && H.push(":enabled", ":disabled"),
                                          (O.appendChild(e).disabled = !0),
                                          2 !== e.querySelectorAll(":disabled").length && H.push(":enabled", ":disabled"),
                                          e.querySelectorAll("*,:x"),
                                          H.push(",.*:");
                                  })),
                              (b.matchesSelector = he.test(($ = O.matches || O.webkitMatchesSelector || O.mozMatchesSelector || O.oMatchesSelector || O.msMatchesSelector))) &&
                                  i(function (e) {
                                      (b.disconnectedMatch = $.call(e, "*")), $.call(e, "[s!='']:x"), P.push("!=", re);
                                  }),
                              (H = H.length && new RegExp(H.join("|"))),
                              (P = P.length && new RegExp(P.join("|"))),
                              (t = he.test(O.compareDocumentPosition)),
                              (I =
                                  t || he.test(O.contains)
                                      ? function (e, t) {
                                            var n = 9 === e.nodeType ? e.documentElement : e,
                                                r = t && t.parentNode;
                                            return e === r || !(!r || 1 !== r.nodeType || !(n.contains ? n.contains(r) : e.compareDocumentPosition && 16 & e.compareDocumentPosition(r)));
                                        }
                                      : function (e, t) {
                                            if (t) for (; (t = t.parentNode); ) if (t === e) return !0;
                                            return !1;
                                        }),
                              (U = t
                                  ? function (e, t) {
                                        if (e === t) return (N = !0), 0;
                                        var n = !e.compareDocumentPosition - !t.compareDocumentPosition;
                                        return (
                                            n ||
                                            ((n = (e.ownerDocument || e) === (t.ownerDocument || t) ? e.compareDocumentPosition(t) : 1),
                                            1 & n || (!b.sortDetached && t.compareDocumentPosition(e) === n)
                                                ? e === L || (e.ownerDocument === M && I(M, e))
                                                    ? -1
                                                    : t === L || (t.ownerDocument === M && I(M, t))
                                                    ? 1
                                                    : j
                                                    ? Z(j, e) - Z(j, t)
                                                    : 0
                                                : 4 & n
                                                ? -1
                                                : 1)
                                        );
                                    }
                                  : function (e, t) {
                                        if (e === t) return (N = !0), 0;
                                        var n,
                                            r = 0,
                                            i = e.parentNode,
                                            o = t.parentNode,
                                            a = [e],
                                            u = [t];
                                        if (!i || !o) return e === L ? -1 : t === L ? 1 : i ? -1 : o ? 1 : j ? Z(j, e) - Z(j, t) : 0;
                                        if (i === o) return s(e, t);
                                        for (n = e; (n = n.parentNode); ) a.unshift(n);
                                        for (n = t; (n = n.parentNode); ) u.unshift(n);
                                        for (; a[r] === u[r]; ) r++;
                                        return r ? s(a[r], u[r]) : a[r] === M ? -1 : u[r] === M ? 1 : 0;
                                    }),
                              L)
                            : L;
                    }),
                    (t.matches = function (e, n) {
                        return t(e, null, null, n);
                    }),
                    (t.matchesSelector = function (e, n) {
                        if (((e.ownerDocument || e) !== L && D(e), (n = n.replace(ue, "='$1']")), b.matchesSelector && q && !W[n + " "] && (!P || !P.test(n)) && (!H || !H.test(n))))
                            try {
                                var r = $.call(e, n);
                                if (r || b.disconnectedMatch || (e.document && 11 !== e.document.nodeType)) return r;
                            } catch (e) {}
                        return t(n, L, null, [e]).length > 0;
                    }),
                    (t.contains = function (e, t) {
                        return (e.ownerDocument || e) !== L && D(e), I(e, t);
                    }),
                    (t.attr = function (e, t) {
                        (e.ownerDocument || e) !== L && D(e);
                        var n = w.attrHandle[t.toLowerCase()],
                            r = n && V.call(w.attrHandle, t.toLowerCase()) ? n(e, t, !q) : void 0;
                        return void 0 !== r ? r : b.attributes || !q ? e.getAttribute(t) : (r = e.getAttributeNode(t)) && r.specified ? r.value : null;
                    }),
                    (t.escape = function (e) {
                        return (e + "").replace(xe, be);
                    }),
                    (t.error = function (e) {
                        throw new Error("Syntax error, unrecognized expression: " + e);
                    }),
                    (t.uniqueSort = function (e) {
                        var t,
                            n = [],
                            r = 0,
                            i = 0;
                        if (((N = !b.detectDuplicates), (j = !b.sortStable && e.slice(0)), e.sort(U), N)) {
                            for (; (t = e[i++]); ) t === e[i] && (r = n.push(i));
                            for (; r--; ) e.splice(n[r], 1);
                        }
                        return (j = null), e;
                    }),
                    (T = t.getText = function (e) {
                        var t,
                            n = "",
                            r = 0,
                            i = e.nodeType;
                        if (i) {
                            if (1 === i || 9 === i || 11 === i) {
                                if ("string" == typeof e.textContent) return e.textContent;
                                for (e = e.firstChild; e; e = e.nextSibling) n += T(e);
                            } else if (3 === i || 4 === i) return e.nodeValue;
                        } else for (; (t = e[r++]); ) n += T(t);
                        return n;
                    }),
                    (w = t.selectors = {
                        cacheLength: 50,
                        createPseudo: r,
                        match: fe,
                        attrHandle: {},
                        find: {},
                        relative: { ">": { dir: "parentNode", first: !0 }, " ": { dir: "parentNode" }, "+": { dir: "previousSibling", first: !0 }, "~": { dir: "previousSibling" } },
                        preFilter: {
                            ATTR: function (e) {
                                return (e[1] = e[1].replace(ve, ye)), (e[3] = (e[3] || e[4] || e[5] || "").replace(ve, ye)), "~=" === e[2] && (e[3] = " " + e[3] + " "), e.slice(0, 4);
                            },
                            CHILD: function (e) {
                                return (
                                    (e[1] = e[1].toLowerCase()),
                                    "nth" === e[1].slice(0, 3) ? (e[3] || t.error(e[0]), (e[4] = +(e[4] ? e[5] + (e[6] || 1) : 2 * ("even" === e[3] || "odd" === e[3]))), (e[5] = +(e[7] + e[8] || "odd" === e[3]))) : e[3] && t.error(e[0]),
                                    e
                                );
                            },
                            PSEUDO: function (e) {
                                var t,
                                    n = !e[6] && e[2];
                                return fe.CHILD.test(e[0])
                                    ? null
                                    : (e[3] ? (e[2] = e[4] || e[5] || "") : n && le.test(n) && (t = E(n, !0)) && (t = n.indexOf(")", n.length - t) - n.length) && ((e[0] = e[0].slice(0, t)), (e[2] = n.slice(0, t))), e.slice(0, 3));
                            },
                        },
                        filter: {
                            TAG: function (e) {
                                var t = e.replace(ve, ye).toLowerCase();
                                return "*" === e
                                    ? function () {
                                          return !0;
                                      }
                                    : function (e) {
                                          return e.nodeName && e.nodeName.toLowerCase() === t;
                                      };
                            },
                            CLASS: function (e) {
                                var t = B[e + " "];
                                return (
                                    t ||
                                    ((t = new RegExp("(^|" + ee + ")" + e + "(" + ee + "|$)")) &&
                                        B(e, function (e) {
                                            return t.test(("string" == typeof e.className && e.className) || (void 0 !== e.getAttribute && e.getAttribute("class")) || "");
                                        }))
                                );
                            },
                            ATTR: function (e, n, r) {
                                return function (i) {
                                    var o = t.attr(i, e);
                                    return null == o
                                        ? "!=" === n
                                        : !n ||
                                              ((o += ""),
                                              "=" === n
                                                  ? o === r
                                                  : "!=" === n
                                                  ? o !== r
                                                  : "^=" === n
                                                  ? r && 0 === o.indexOf(r)
                                                  : "*=" === n
                                                  ? r && o.indexOf(r) > -1
                                                  : "$=" === n
                                                  ? r && o.slice(-r.length) === r
                                                  : "~=" === n
                                                  ? (" " + o.replace(ie, " ") + " ").indexOf(r) > -1
                                                  : "|=" === n && (o === r || o.slice(0, r.length + 1) === r + "-"));
                                };
                            },
                            CHILD: function (e, t, n, r, i) {
                                var o = "nth" !== e.slice(0, 3),
                                    s = "last" !== e.slice(-4),
                                    a = "of-type" === t;
                                return 1 === r && 0 === i
                                    ? function (e) {
                                          return !!e.parentNode;
                                      }
                                    : function (t, n, u) {
                                          var l,
                                              c,
                                              f,
                                              p,
                                              d,
                                              h,
                                              g = o !== s ? "nextSibling" : "previousSibling",
                                              m = t.parentNode,
                                              v = a && t.nodeName.toLowerCase(),
                                              y = !u && !a,
                                              x = !1;
                                          if (m) {
                                              if (o) {
                                                  for (; g; ) {
                                                      for (p = t; (p = p[g]); ) if (a ? p.nodeName.toLowerCase() === v : 1 === p.nodeType) return !1;
                                                      h = g = "only" === e && !h && "nextSibling";
                                                  }
                                                  return !0;
                                              }
                                              if (((h = [s ? m.firstChild : m.lastChild]), s && y)) {
                                                  for (
                                                      p = m, f = p[F] || (p[F] = {}), c = f[p.uniqueID] || (f[p.uniqueID] = {}), l = c[e] || [], d = l[0] === R && l[1], x = d && l[2], p = d && m.childNodes[d];
                                                      (p = (++d && p && p[g]) || (x = d = 0) || h.pop());

                                                  )
                                                      if (1 === p.nodeType && ++x && p === t) {
                                                          c[e] = [R, d, x];
                                                          break;
                                                      }
                                              } else if ((y && ((p = t), (f = p[F] || (p[F] = {})), (c = f[p.uniqueID] || (f[p.uniqueID] = {})), (l = c[e] || []), (d = l[0] === R && l[1]), (x = d)), !1 === x))
                                                  for (
                                                      ;
                                                      (p = (++d && p && p[g]) || (x = d = 0) || h.pop()) &&
                                                      ((a ? p.nodeName.toLowerCase() !== v : 1 !== p.nodeType) || !++x || (y && ((f = p[F] || (p[F] = {})), (c = f[p.uniqueID] || (f[p.uniqueID] = {})), (c[e] = [R, x])), p !== t));

                                                  );
                                              return (x -= i) === r || (x % r == 0 && x / r >= 0);
                                          }
                                      };
                            },
                            PSEUDO: function (e, n) {
                                var i,
                                    o = w.pseudos[e] || w.setFilters[e.toLowerCase()] || t.error("unsupported pseudo: " + e);
                                return o[F]
                                    ? o(n)
                                    : o.length > 1
                                    ? ((i = [e, e, "", n]),
                                      w.setFilters.hasOwnProperty(e.toLowerCase())
                                          ? r(function (e, t) {
                                                for (var r, i = o(e, n), s = i.length; s--; ) (r = Z(e, i[s])), (e[r] = !(t[r] = i[s]));
                                            })
                                          : function (e) {
                                                return o(e, 0, i);
                                            })
                                    : o;
                            },
                        },
                        pseudos: {
                            not: r(function (e) {
                                var t = [],
                                    n = [],
                                    i = C(e.replace(oe, "$1"));
                                return i[F]
                                    ? r(function (e, t, n, r) {
                                          for (var o, s = i(e, null, r, []), a = e.length; a--; ) (o = s[a]) && (e[a] = !(t[a] = o));
                                      })
                                    : function (e, r, o) {
                                          return (t[0] = e), i(t, null, o, n), (t[0] = null), !n.pop();
                                      };
                            }),
                            has: r(function (e) {
                                return function (n) {
                                    return t(e, n).length > 0;
                                };
                            }),
                            contains: r(function (e) {
                                return (
                                    (e = e.replace(ve, ye)),
                                    function (t) {
                                        return (t.textContent || t.innerText || T(t)).indexOf(e) > -1;
                                    }
                                );
                            }),
                            lang: r(function (e) {
                                return (
                                    ce.test(e || "") || t.error("unsupported lang: " + e),
                                    (e = e.replace(ve, ye).toLowerCase()),
                                    function (t) {
                                        var n;
                                        do {
                                            if ((n = q ? t.lang : t.getAttribute("xml:lang") || t.getAttribute("lang"))) return (n = n.toLowerCase()) === e || 0 === n.indexOf(e + "-");
                                        } while ((t = t.parentNode) && 1 === t.nodeType);
                                        return !1;
                                    }
                                );
                            }),
                            target: function (t) {
                                var n = e.location && e.location.hash;
                                return n && n.slice(1) === t.id;
                            },
                            root: function (e) {
                                return e === O;
                            },
                            focus: function (e) {
                                return e === L.activeElement && (!L.hasFocus || L.hasFocus()) && !!(e.type || e.href || ~e.tabIndex);
                            },
                            enabled: a(!1),
                            disabled: a(!0),
                            checked: function (e) {
                                var t = e.nodeName.toLowerCase();
                                return ("input" === t && !!e.checked) || ("option" === t && !!e.selected);
                            },
                            selected: function (e) {
                                return e.parentNode && e.parentNode.selectedIndex, !0 === e.selected;
                            },
                            empty: function (e) {
                                for (e = e.firstChild; e; e = e.nextSibling) if (e.nodeType < 6) return !1;
                                return !0;
                            },
                            parent: function (e) {
                                return !w.pseudos.empty(e);
                            },
                            header: function (e) {
                                return de.test(e.nodeName);
                            },
                            input: function (e) {
                                return pe.test(e.nodeName);
                            },
                            button: function (e) {
                                var t = e.nodeName.toLowerCase();
                                return ("input" === t && "button" === e.type) || "button" === t;
                            },
                            text: function (e) {
                                var t;
                                return "input" === e.nodeName.toLowerCase() && "text" === e.type && (null == (t = e.getAttribute("type")) || "text" === t.toLowerCase());
                            },
                            first: u(function () {
                                return [0];
                            }),
                            last: u(function (e, t) {
                                return [t - 1];
                            }),
                            eq: u(function (e, t, n) {
                                return [n < 0 ? n + t : n];
                            }),
                            even: u(function (e, t) {
                                for (var n = 0; n < t; n += 2) e.push(n);
                                return e;
                            }),
                            odd: u(function (e, t) {
                                for (var n = 1; n < t; n += 2) e.push(n);
                                return e;
                            }),
                            lt: u(function (e, t, n) {
                                for (var r = n < 0 ? n + t : n; --r >= 0; ) e.push(r);
                                return e;
                            }),
                            gt: u(function (e, t, n) {
                                for (var r = n < 0 ? n + t : n; ++r < t; ) e.push(r);
                                return e;
                            }),
                        },
                    }),
                    (w.pseudos.nth = w.pseudos.eq);
                for (x in { radio: !0, checkbox: !0, file: !0, password: !0, image: !0 })
                    w.pseudos[x] = (function (e) {
                        return function (t) {
                            return "input" === t.nodeName.toLowerCase() && t.type === e;
                        };
                    })(x);
                for (x in { submit: !0, reset: !0 })
                    w.pseudos[x] = (function (e) {
                        return function (t) {
                            var n = t.nodeName.toLowerCase();
                            return ("input" === n || "button" === n) && t.type === e;
                        };
                    })(x);
                return (
                    (c.prototype = w.filters = w.pseudos),
                    (w.setFilters = new c()),
                    (E = t.tokenize = function (e, n) {
                        var r,
                            i,
                            o,
                            s,
                            a,
                            u,
                            l,
                            c = _[e + " "];
                        if (c) return n ? 0 : c.slice(0);
                        for (a = e, u = [], l = w.preFilter; a; ) {
                            (r && !(i = se.exec(a))) || (i && (a = a.slice(i[0].length) || a), u.push((o = []))), (r = !1), (i = ae.exec(a)) && ((r = i.shift()), o.push({ value: r, type: i[0].replace(oe, " ") }), (a = a.slice(r.length)));
                            for (s in w.filter) !(i = fe[s].exec(a)) || (l[s] && !(i = l[s](i))) || ((r = i.shift()), o.push({ value: r, type: s, matches: i }), (a = a.slice(r.length)));
                            if (!r) break;
                        }
                        return n ? a.length : a ? t.error(e) : _(e, u).slice(0);
                    }),
                    (C = t.compile = function (e, t) {
                        var n,
                            r = [],
                            i = [],
                            o = W[e + " "];
                        if (!o) {
                            for (t || (t = E(e)), n = t.length; n--; ) (o = v(t[n])), o[F] ? r.push(o) : i.push(o);
                            (o = W(e, y(i, r))), (o.selector = e);
                        }
                        return o;
                    }),
                    (A = t.select = function (e, t, n, r) {
                        var i,
                            o,
                            s,
                            a,
                            u,
                            c = "function" == typeof e && e,
                            p = !r && E((e = c.selector || e));
                        if (((n = n || []), 1 === p.length)) {
                            if (((o = p[0] = p[0].slice(0)), o.length > 2 && "ID" === (s = o[0]).type && 9 === t.nodeType && q && w.relative[o[1].type])) {
                                if (!(t = (w.find.ID(s.matches[0].replace(ve, ye), t) || [])[0])) return n;
                                c && (t = t.parentNode), (e = e.slice(o.shift().value.length));
                            }
                            for (i = fe.needsContext.test(e) ? 0 : o.length; i-- && ((s = o[i]), !w.relative[(a = s.type)]); )
                                if ((u = w.find[a]) && (r = u(s.matches[0].replace(ve, ye), (me.test(o[0].type) && l(t.parentNode)) || t))) {
                                    if ((o.splice(i, 1), !(e = r.length && f(o)))) return J.apply(n, r), n;
                                    break;
                                }
                        }
                        return (c || C(e, p))(r, t, !q, n, !t || (me.test(e) && l(t.parentNode)) || t), n;
                    }),
                    (b.sortStable = F.split("").sort(U).join("") === F),
                    (b.detectDuplicates = !!N),
                    D(),
                    (b.sortDetached = i(function (e) {
                        return 1 & e.compareDocumentPosition(L.createElement("fieldset"));
                    })),
                    i(function (e) {
                        return (e.innerHTML = "<a href='#'></a>"), "#" === e.firstChild.getAttribute("href");
                    }) ||
                        o("type|href|height|width", function (e, t, n) {
                            if (!n) return e.getAttribute(t, "type" === t.toLowerCase() ? 1 : 2);
                        }),
                    (b.attributes &&
                        i(function (e) {
                            return (e.innerHTML = "<input/>"), e.firstChild.setAttribute("value", ""), "" === e.firstChild.getAttribute("value");
                        })) ||
                        o("value", function (e, t, n) {
                            if (!n && "input" === e.nodeName.toLowerCase()) return e.defaultValue;
                        }),
                    i(function (e) {
                        return null == e.getAttribute("disabled");
                    }) ||
                        o(K, function (e, t, n) {
                            var r;
                            if (!n) return !0 === e[t] ? t.toLowerCase() : (r = e.getAttributeNode(t)) && r.specified ? r.value : null;
                        }),
                    t
                );
            })(n);
            (Ce.find = Se),
                (Ce.expr = Se.selectors),
                (Ce.expr[":"] = Ce.expr.pseudos),
                (Ce.uniqueSort = Ce.unique = Se.uniqueSort),
                (Ce.text = Se.getText),
                (Ce.isXMLDoc = Se.isXML),
                (Ce.contains = Se.contains),
                (Ce.escapeSelector = Se.escape);
            var je = function (e, t, n) {
                    for (var r = [], i = void 0 !== n; (e = e[t]) && 9 !== e.nodeType; )
                        if (1 === e.nodeType) {
                            if (i && Ce(e).is(n)) break;
                            r.push(e);
                        }
                    return r;
                },
                Ne = function (e, t) {
                    for (var n = []; e; e = e.nextSibling) 1 === e.nodeType && e !== t && n.push(e);
                    return n;
                },
                De = Ce.expr.match.needsContext,
                Le = /^<([a-z][^\/\0>:\x20\t\r\n\f]*)[\x20\t\r\n\f]*\/?>(?:<\/\1>|)$/i;
            (Ce.filter = function (e, t, n) {
                var r = t[0];
                return (
                    n && (e = ":not(" + e + ")"),
                    1 === t.length && 1 === r.nodeType
                        ? Ce.find.matchesSelector(r, e)
                            ? [r]
                            : []
                        : Ce.find.matches(
                              e,
                              Ce.grep(t, function (e) {
                                  return 1 === e.nodeType;
                              })
                          )
                );
            }),
                Ce.fn.extend({
                    find: function (e) {
                        var t,
                            n,
                            r = this.length,
                            i = this;
                        if ("string" != typeof e)
                            return this.pushStack(
                                Ce(e).filter(function () {
                                    for (t = 0; t < r; t++) if (Ce.contains(i[t], this)) return !0;
                                })
                            );
                        for (n = this.pushStack([]), t = 0; t < r; t++) Ce.find(e, i[t], n);
                        return r > 1 ? Ce.uniqueSort(n) : n;
                    },
                    filter: function (e) {
                        return this.pushStack(c(this, e || [], !1));
                    },
                    not: function (e) {
                        return this.pushStack(c(this, e || [], !0));
                    },
                    is: function (e) {
                        return !!c(this, "string" == typeof e && De.test(e) ? Ce(e) : e || [], !1).length;
                    },
                });
            var Oe,
                qe = /^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]+))$/;
            ((Ce.fn.init = function (e, t, n) {
                var r, i;
                if (!e) return this;
                if (((n = n || Oe), "string" == typeof e)) {
                    if (!(r = "<" === e[0] && ">" === e[e.length - 1] && e.length >= 3 ? [null, e, null] : qe.exec(e)) || (!r[1] && t)) return !t || t.jquery ? (t || n).find(e) : this.constructor(t).find(e);
                    if (r[1]) {
                        if (((t = t instanceof Ce ? t[0] : t), Ce.merge(this, Ce.parseHTML(r[1], t && t.nodeType ? t.ownerDocument || t : ce, !0)), Le.test(r[1]) && Ce.isPlainObject(t)))
                            for (r in t) Te(this[r]) ? this[r](t[r]) : this.attr(r, t[r]);
                        return this;
                    }
                    return (i = ce.getElementById(r[2])), i && ((this[0] = i), (this.length = 1)), this;
                }
                return e.nodeType ? ((this[0] = e), (this.length = 1), this) : Te(e) ? (void 0 !== n.ready ? n.ready(e) : e(Ce)) : Ce.makeArray(e, this);
            }).prototype = Ce.fn),
                (Oe = Ce(ce));
            var He = /^(?:parents|prev(?:Until|All))/,
                Pe = { children: !0, contents: !0, next: !0, prev: !0 };
            Ce.fn.extend({
                has: function (e) {
                    var t = Ce(e, this),
                        n = t.length;
                    return this.filter(function () {
                        for (var e = 0; e < n; e++) if (Ce.contains(this, t[e])) return !0;
                    });
                },
                closest: function (e, t) {
                    var n,
                        r = 0,
                        i = this.length,
                        o = [],
                        s = "string" != typeof e && Ce(e);
                    if (!De.test(e))
                        for (; r < i; r++)
                            for (n = this[r]; n && n !== t; n = n.parentNode)
                                if (n.nodeType < 11 && (s ? s.index(n) > -1 : 1 === n.nodeType && Ce.find.matchesSelector(n, e))) {
                                    o.push(n);
                                    break;
                                }
                    return this.pushStack(o.length > 1 ? Ce.uniqueSort(o) : o);
                },
                index: function (e) {
                    return e ? ("string" == typeof e ? ge.call(Ce(e), this[0]) : ge.call(this, e.jquery ? e[0] : e)) : this[0] && this[0].parentNode ? this.first().prevAll().length : -1;
                },
                add: function (e, t) {
                    return this.pushStack(Ce.uniqueSort(Ce.merge(this.get(), Ce(e, t))));
                },
                addBack: function (e) {
                    return this.add(null == e ? this.prevObject : this.prevObject.filter(e));
                },
            }),
                Ce.each(
                    {
                        parent: function (e) {
                            var t = e.parentNode;
                            return t && 11 !== t.nodeType ? t : null;
                        },
                        parents: function (e) {
                            return je(e, "parentNode");
                        },
                        parentsUntil: function (e, t, n) {
                            return je(e, "parentNode", n);
                        },
                        next: function (e) {
                            return f(e, "nextSibling");
                        },
                        prev: function (e) {
                            return f(e, "previousSibling");
                        },
                        nextAll: function (e) {
                            return je(e, "nextSibling");
                        },
                        prevAll: function (e) {
                            return je(e, "previousSibling");
                        },
                        nextUntil: function (e, t, n) {
                            return je(e, "nextSibling", n);
                        },
                        prevUntil: function (e, t, n) {
                            return je(e, "previousSibling", n);
                        },
                        siblings: function (e) {
                            return Ne((e.parentNode || {}).firstChild, e);
                        },
                        children: function (e) {
                            return Ne(e.firstChild);
                        },
                        contents: function (e) {
                            return l(e, "iframe") ? e.contentDocument : (l(e, "template") && (e = e.content || e), Ce.merge([], e.childNodes));
                        },
                    },
                    function (e, t) {
                        Ce.fn[e] = function (n, r) {
                            var i = Ce.map(this, t, n);
                            return "Until" !== e.slice(-5) && (r = n), r && "string" == typeof r && (i = Ce.filter(r, i)), this.length > 1 && (Pe[e] || Ce.uniqueSort(i), He.test(e) && i.reverse()), this.pushStack(i);
                        };
                    }
                );
            var $e = /[^\x20\t\r\n\f]+/g;
            (Ce.Callbacks = function (e) {
                e = "string" == typeof e ? p(e) : Ce.extend({}, e);
                var t,
                    n,
                    r,
                    i,
                    o = [],
                    s = [],
                    u = -1,
                    l = function () {
                        for (i = i || e.once, r = t = !0; s.length; u = -1) for (n = s.shift(); ++u < o.length; ) !1 === o[u].apply(n[0], n[1]) && e.stopOnFalse && ((u = o.length), (n = !1));
                        e.memory || (n = !1), (t = !1), i && (o = n ? [] : "");
                    },
                    c = {
                        add: function () {
                            return (
                                o &&
                                    (n && !t && ((u = o.length - 1), s.push(n)),
                                    (function t(n) {
                                        Ce.each(n, function (n, r) {
                                            Te(r) ? (e.unique && c.has(r)) || o.push(r) : r && r.length && "string" !== a(r) && t(r);
                                        });
                                    })(arguments),
                                    n && !t && l()),
                                this
                            );
                        },
                        remove: function () {
                            return (
                                Ce.each(arguments, function (e, t) {
                                    for (var n; (n = Ce.inArray(t, o, n)) > -1; ) o.splice(n, 1), n <= u && u--;
                                }),
                                this
                            );
                        },
                        has: function (e) {
                            return e ? Ce.inArray(e, o) > -1 : o.length > 0;
                        },
                        empty: function () {
                            return o && (o = []), this;
                        },
                        disable: function () {
                            return (i = s = []), (o = n = ""), this;
                        },
                        disabled: function () {
                            return !o;
                        },
                        lock: function () {
                            return (i = s = []), n || t || (o = n = ""), this;
                        },
                        locked: function () {
                            return !!i;
                        },
                        fireWith: function (e, n) {
                            return i || ((n = n || []), (n = [e, n.slice ? n.slice() : n]), s.push(n), t || l()), this;
                        },
                        fire: function () {
                            return c.fireWith(this, arguments), this;
                        },
                        fired: function () {
                            return !!r;
                        },
                    };
                return c;
            }),
                Ce.extend({
                    Deferred: function (e) {
                        var t = [
                                ["notify", "progress", Ce.Callbacks("memory"), Ce.Callbacks("memory"), 2],
                                ["resolve", "done", Ce.Callbacks("once memory"), Ce.Callbacks("once memory"), 0, "resolved"],
                                ["reject", "fail", Ce.Callbacks("once memory"), Ce.Callbacks("once memory"), 1, "rejected"],
                            ],
                            r = "pending",
                            i = {
                                state: function () {
                                    return r;
                                },
                                always: function () {
                                    return o.done(arguments).fail(arguments), this;
                                },
                                catch: function (e) {
                                    return i.then(null, e);
                                },
                                pipe: function () {
                                    var e = arguments;
                                    return Ce.Deferred(function (n) {
                                        Ce.each(t, function (t, r) {
                                            var i = Te(e[r[4]]) && e[r[4]];
                                            o[r[1]](function () {
                                                var e = i && i.apply(this, arguments);
                                                e && Te(e.promise) ? e.promise().progress(n.notify).done(n.resolve).fail(n.reject) : n[r[0] + "With"](this, i ? [e] : arguments);
                                            });
                                        }),
                                            (e = null);
                                    }).promise();
                                },
                                then: function (e, r, i) {
                                    function o(e, t, r, i) {
                                        return function () {
                                            var a = this,
                                                u = arguments,
                                                l = function () {
                                                    var n, l;
                                                    if (!(e < s)) {
                                                        if ((n = r.apply(a, u)) === t.promise()) throw new TypeError("Thenable self-resolution");
                                                        (l = n && ("object" == typeof n || "function" == typeof n) && n.then),
                                                            Te(l)
                                                                ? i
                                                                    ? l.call(n, o(s, t, d, i), o(s, t, h, i))
                                                                    : (s++, l.call(n, o(s, t, d, i), o(s, t, h, i), o(s, t, d, t.notifyWith)))
                                                                : (r !== d && ((a = void 0), (u = [n])), (i || t.resolveWith)(a, u));
                                                    }
                                                },
                                                c = i
                                                    ? l
                                                    : function () {
                                                          try {
                                                              l();
                                                          } catch (n) {
                                                              Ce.Deferred.exceptionHook && Ce.Deferred.exceptionHook(n, c.stackTrace), e + 1 >= s && (r !== h && ((a = void 0), (u = [n])), t.rejectWith(a, u));
                                                          }
                                                      };
                                            e ? c() : (Ce.Deferred.getStackHook && (c.stackTrace = Ce.Deferred.getStackHook()), n.setTimeout(c));
                                        };
                                    }
                                    var s = 0;
                                    return Ce.Deferred(function (n) {
                                        t[0][3].add(o(0, n, Te(i) ? i : d, n.notifyWith)), t[1][3].add(o(0, n, Te(e) ? e : d)), t[2][3].add(o(0, n, Te(r) ? r : h));
                                    }).promise();
                                },
                                promise: function (e) {
                                    return null != e ? Ce.extend(e, i) : i;
                                },
                            },
                            o = {};
                        return (
                            Ce.each(t, function (e, n) {
                                var s = n[2],
                                    a = n[5];
                                (i[n[1]] = s.add),
                                    a &&
                                        s.add(
                                            function () {
                                                r = a;
                                            },
                                            t[3 - e][2].disable,
                                            t[3 - e][3].disable,
                                            t[0][2].lock,
                                            t[0][3].lock
                                        ),
                                    s.add(n[3].fire),
                                    (o[n[0]] = function () {
                                        return o[n[0] + "With"](this === o ? void 0 : this, arguments), this;
                                    }),
                                    (o[n[0] + "With"] = s.fireWith);
                            }),
                            i.promise(o),
                            e && e.call(o, o),
                            o
                        );
                    },
                    when: function (e) {
                        var t = arguments.length,
                            n = t,
                            r = Array(n),
                            i = pe.call(arguments),
                            o = Ce.Deferred(),
                            s = function (e) {
                                return function (n) {
                                    (r[e] = this), (i[e] = arguments.length > 1 ? pe.call(arguments) : n), --t || o.resolveWith(r, i);
                                };
                            };
                        if (t <= 1 && (g(e, o.done(s(n)).resolve, o.reject, !t), "pending" === o.state() || Te(i[n] && i[n].then))) return o.then();
                        for (; n--; ) g(i[n], s(n), o.reject);
                        return o.promise();
                    },
                });
            var Ie = /^(Eval|Internal|Range|Reference|Syntax|Type|URI)Error$/;
            (Ce.Deferred.exceptionHook = function (e, t) {
                n.console && n.console.warn && e && Ie.test(e.name) && n.console.warn("jQuery.Deferred exception: " + e.message, e.stack, t);
            }),
                (Ce.readyException = function (e) {
                    n.setTimeout(function () {
                        throw e;
                    });
                });
            var Fe = Ce.Deferred();
            (Ce.fn.ready = function (e) {
                return (
                    Fe.then(e).catch(function (e) {
                        Ce.readyException(e);
                    }),
                    this
                );
            }),
                Ce.extend({
                    isReady: !1,
                    readyWait: 1,
                    ready: function (e) {
                        (!0 === e ? --Ce.readyWait : Ce.isReady) || ((Ce.isReady = !0), (!0 !== e && --Ce.readyWait > 0) || Fe.resolveWith(ce, [Ce]));
                    },
                }),
                (Ce.ready.then = Fe.then),
                "complete" === ce.readyState || ("loading" !== ce.readyState && !ce.documentElement.doScroll) ? n.setTimeout(Ce.ready) : (ce.addEventListener("DOMContentLoaded", m), n.addEventListener("load", m));
            var Me = function (e, t, n, r, i, o, s) {
                    var u = 0,
                        l = e.length,
                        c = null == n;
                    if ("object" === a(n)) {
                        i = !0;
                        for (u in n) Me(e, t, u, n[u], !0, o, s);
                    } else if (
                        void 0 !== r &&
                        ((i = !0),
                        Te(r) || (s = !0),
                        c &&
                            (s
                                ? (t.call(e, r), (t = null))
                                : ((c = t),
                                  (t = function (e, t, n) {
                                      return c.call(Ce(e), n);
                                  }))),
                        t)
                    )
                        for (; u < l; u++) t(e[u], n, s ? r : r.call(e[u], u, t(e[u], n)));
                    return i ? e : c ? t.call(e) : l ? t(e[0], n) : o;
                },
                Re = /^-ms-/,
                ze = /-([a-z])/g,
                Be = function (e) {
                    return 1 === e.nodeType || 9 === e.nodeType || !+e.nodeType;
                };
            (x.uid = 1),
                (x.prototype = {
                    cache: function (e) {
                        var t = e[this.expando];
                        return t || ((t = {}), Be(e) && (e.nodeType ? (e[this.expando] = t) : Object.defineProperty(e, this.expando, { value: t, configurable: !0 }))), t;
                    },
                    set: function (e, t, n) {
                        var r,
                            i = this.cache(e);
                        if ("string" == typeof t) i[y(t)] = n;
                        else for (r in t) i[y(r)] = t[r];
                        return i;
                    },
                    get: function (e, t) {
                        return void 0 === t ? this.cache(e) : e[this.expando] && e[this.expando][y(t)];
                    },
                    access: function (e, t, n) {
                        return void 0 === t || (t && "string" == typeof t && void 0 === n) ? this.get(e, t) : (this.set(e, t, n), void 0 !== n ? n : t);
                    },
                    remove: function (e, t) {
                        var n,
                            r = e[this.expando];
                        if (void 0 !== r) {
                            if (void 0 !== t) {
                                Array.isArray(t) ? (t = t.map(y)) : ((t = y(t)), (t = t in r ? [t] : t.match($e) || [])), (n = t.length);
                                for (; n--; ) delete r[t[n]];
                            }
                            (void 0 === t || Ce.isEmptyObject(r)) && (e.nodeType ? (e[this.expando] = void 0) : delete e[this.expando]);
                        }
                    },
                    hasData: function (e) {
                        var t = e[this.expando];
                        return void 0 !== t && !Ce.isEmptyObject(t);
                    },
                });
            var _e = new x(),
                We = new x(),
                Ue = /^(?:\{[\w\W]*\}|\[[\w\W]*\])$/,
                Ve = /[A-Z]/g;
            Ce.extend({
                hasData: function (e) {
                    return We.hasData(e) || _e.hasData(e);
                },
                data: function (e, t, n) {
                    return We.access(e, t, n);
                },
                removeData: function (e, t) {
                    We.remove(e, t);
                },
                _data: function (e, t, n) {
                    return _e.access(e, t, n);
                },
                _removeData: function (e, t) {
                    _e.remove(e, t);
                },
            }),
                Ce.fn.extend({
                    data: function (e, t) {
                        var n,
                            r,
                            i,
                            o = this[0],
                            s = o && o.attributes;
                        if (void 0 === e) {
                            if (this.length && ((i = We.get(o)), 1 === o.nodeType && !_e.get(o, "hasDataAttrs"))) {
                                for (n = s.length; n--; ) s[n] && ((r = s[n].name), 0 === r.indexOf("data-") && ((r = y(r.slice(5))), w(o, r, i[r])));
                                _e.set(o, "hasDataAttrs", !0);
                            }
                            return i;
                        }
                        return "object" == typeof e
                            ? this.each(function () {
                                  We.set(this, e);
                              })
                            : Me(
                                  this,
                                  function (t) {
                                      var n;
                                      if (o && void 0 === t) {
                                          if (void 0 !== (n = We.get(o, e))) return n;
                                          if (void 0 !== (n = w(o, e))) return n;
                                      } else
                                          this.each(function () {
                                              We.set(this, e, t);
                                          });
                                  },
                                  null,
                                  t,
                                  arguments.length > 1,
                                  null,
                                  !0
                              );
                    },
                    removeData: function (e) {
                        return this.each(function () {
                            We.remove(this, e);
                        });
                    },
                }),
                Ce.extend({
                    queue: function (e, t, n) {
                        var r;
                        if (e) return (t = (t || "fx") + "queue"), (r = _e.get(e, t)), n && (!r || Array.isArray(n) ? (r = _e.access(e, t, Ce.makeArray(n))) : r.push(n)), r || [];
                    },
                    dequeue: function (e, t) {
                        t = t || "fx";
                        var n = Ce.queue(e, t),
                            r = n.length,
                            i = n.shift(),
                            o = Ce._queueHooks(e, t),
                            s = function () {
                                Ce.dequeue(e, t);
                            };
                        "inprogress" === i && ((i = n.shift()), r--), i && ("fx" === t && n.unshift("inprogress"), delete o.stop, i.call(e, s, o)), !r && o && o.empty.fire();
                    },
                    _queueHooks: function (e, t) {
                        var n = t + "queueHooks";
                        return (
                            _e.get(e, n) ||
                            _e.access(e, n, {
                                empty: Ce.Callbacks("once memory").add(function () {
                                    _e.remove(e, [t + "queue", n]);
                                }),
                            })
                        );
                    },
                }),
                Ce.fn.extend({
                    queue: function (e, t) {
                        var n = 2;
                        return (
                            "string" != typeof e && ((t = e), (e = "fx"), n--),
                            arguments.length < n
                                ? Ce.queue(this[0], e)
                                : void 0 === t
                                ? this
                                : this.each(function () {
                                      var n = Ce.queue(this, e, t);
                                      Ce._queueHooks(this, e), "fx" === e && "inprogress" !== n[0] && Ce.dequeue(this, e);
                                  })
                        );
                    },
                    dequeue: function (e) {
                        return this.each(function () {
                            Ce.dequeue(this, e);
                        });
                    },
                    clearQueue: function (e) {
                        return this.queue(e || "fx", []);
                    },
                    promise: function (e, t) {
                        var n,
                            r = 1,
                            i = Ce.Deferred(),
                            o = this,
                            s = this.length,
                            a = function () {
                                --r || i.resolveWith(o, [o]);
                            };
                        for ("string" != typeof e && ((t = e), (e = void 0)), e = e || "fx"; s--; ) (n = _e.get(o[s], e + "queueHooks")) && n.empty && (r++, n.empty.add(a));
                        return a(), i.promise(t);
                    },
                });
            var Ye = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,
                Xe = new RegExp("^(?:([+-])=|)(" + Ye + ")([a-z%]*)$", "i"),
                Ge = ["Top", "Right", "Bottom", "Left"],
                Je = function (e, t) {
                    return (e = t || e), "none" === e.style.display || ("" === e.style.display && Ce.contains(e.ownerDocument, e) && "none" === Ce.css(e, "display"));
                },
                Qe = function (e, t, n, r) {
                    var i,
                        o,
                        s = {};
                    for (o in t) (s[o] = e.style[o]), (e.style[o] = t[o]);
                    i = n.apply(e, r || []);
                    for (o in t) e.style[o] = s[o];
                    return i;
                },
                Ze = {};
            Ce.fn.extend({
                show: function () {
                    return E(this, !0);
                },
                hide: function () {
                    return E(this);
                },
                toggle: function (e) {
                    return "boolean" == typeof e
                        ? e
                            ? this.show()
                            : this.hide()
                        : this.each(function () {
                              Je(this) ? Ce(this).show() : Ce(this).hide();
                          });
                },
            });
            var Ke = /^(?:checkbox|radio)$/i,
                et = /<([a-z][^\/\0>\x20\t\r\n\f]+)/i,
                tt = /^$|^module$|\/(?:java|ecma)script/i,
                nt = {
                    option: [1, "<select multiple='multiple'>", "</select>"],
                    thead: [1, "<table>", "</table>"],
                    col: [2, "<table><colgroup>", "</colgroup></table>"],
                    tr: [2, "<table><tbody>", "</tbody></table>"],
                    td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
                    _default: [0, "", ""],
                };
            (nt.optgroup = nt.option), (nt.tbody = nt.tfoot = nt.colgroup = nt.caption = nt.thead), (nt.th = nt.td);
            var rt = /<|&#?\w+;/;
            !(function () {
                var e = ce.createDocumentFragment(),
                    t = e.appendChild(ce.createElement("div")),
                    n = ce.createElement("input");
                n.setAttribute("type", "radio"),
                    n.setAttribute("checked", "checked"),
                    n.setAttribute("name", "t"),
                    t.appendChild(n),
                    (we.checkClone = t.cloneNode(!0).cloneNode(!0).lastChild.checked),
                    (t.innerHTML = "<textarea>x</textarea>"),
                    (we.noCloneChecked = !!t.cloneNode(!0).lastChild.defaultValue);
            })();
            var it = ce.documentElement,
                ot = /^key/,
                st = /^(?:mouse|pointer|contextmenu|drag|drop)|click/,
                at = /^([^.]*)(?:\.(.+)|)/;
            (Ce.event = {
                global: {},
                add: function (e, t, n, r, i) {
                    var o,
                        s,
                        a,
                        u,
                        l,
                        c,
                        f,
                        p,
                        d,
                        h,
                        g,
                        m = _e.get(e);
                    if (m)
                        for (
                            n.handler && ((o = n), (n = o.handler), (i = o.selector)),
                                i && Ce.find.matchesSelector(it, i),
                                n.guid || (n.guid = Ce.guid++),
                                (u = m.events) || (u = m.events = {}),
                                (s = m.handle) ||
                                    (s = m.handle = function (t) {
                                        return void 0 !== Ce && Ce.event.triggered !== t.type ? Ce.event.dispatch.apply(e, arguments) : void 0;
                                    }),
                                t = (t || "").match($e) || [""],
                                l = t.length;
                            l--;

                        )
                            (a = at.exec(t[l]) || []),
                                (d = g = a[1]),
                                (h = (a[2] || "").split(".").sort()),
                                d &&
                                    ((f = Ce.event.special[d] || {}),
                                    (d = (i ? f.delegateType : f.bindType) || d),
                                    (f = Ce.event.special[d] || {}),
                                    (c = Ce.extend({ type: d, origType: g, data: r, handler: n, guid: n.guid, selector: i, needsContext: i && Ce.expr.match.needsContext.test(i), namespace: h.join(".") }, o)),
                                    (p = u[d]) || ((p = u[d] = []), (p.delegateCount = 0), (f.setup && !1 !== f.setup.call(e, r, h, s)) || (e.addEventListener && e.addEventListener(d, s))),
                                    f.add && (f.add.call(e, c), c.handler.guid || (c.handler.guid = n.guid)),
                                    i ? p.splice(p.delegateCount++, 0, c) : p.push(c),
                                    (Ce.event.global[d] = !0));
                },
                remove: function (e, t, n, r, i) {
                    var o,
                        s,
                        a,
                        u,
                        l,
                        c,
                        f,
                        p,
                        d,
                        h,
                        g,
                        m = _e.hasData(e) && _e.get(e);
                    if (m && (u = m.events)) {
                        for (t = (t || "").match($e) || [""], l = t.length; l--; )
                            if (((a = at.exec(t[l]) || []), (d = g = a[1]), (h = (a[2] || "").split(".").sort()), d)) {
                                for (f = Ce.event.special[d] || {}, d = (r ? f.delegateType : f.bindType) || d, p = u[d] || [], a = a[2] && new RegExp("(^|\\.)" + h.join("\\.(?:.*\\.|)") + "(\\.|$)"), s = o = p.length; o--; )
                                    (c = p[o]),
                                        (!i && g !== c.origType) ||
                                            (n && n.guid !== c.guid) ||
                                            (a && !a.test(c.namespace)) ||
                                            (r && r !== c.selector && ("**" !== r || !c.selector)) ||
                                            (p.splice(o, 1), c.selector && p.delegateCount--, f.remove && f.remove.call(e, c));
                                s && !p.length && ((f.teardown && !1 !== f.teardown.call(e, h, m.handle)) || Ce.removeEvent(e, d, m.handle), delete u[d]);
                            } else for (d in u) Ce.event.remove(e, d + t[l], n, r, !0);
                        Ce.isEmptyObject(u) && _e.remove(e, "handle events");
                    }
                },
                dispatch: function (e) {
                    var t,
                        n,
                        r,
                        i,
                        o,
                        s,
                        a = Ce.event.fix(e),
                        u = new Array(arguments.length),
                        l = (_e.get(this, "events") || {})[a.type] || [],
                        c = Ce.event.special[a.type] || {};
                    for (u[0] = a, t = 1; t < arguments.length; t++) u[t] = arguments[t];
                    if (((a.delegateTarget = this), !c.preDispatch || !1 !== c.preDispatch.call(this, a))) {
                        for (s = Ce.event.handlers.call(this, a, l), t = 0; (i = s[t++]) && !a.isPropagationStopped(); )
                            for (a.currentTarget = i.elem, n = 0; (o = i.handlers[n++]) && !a.isImmediatePropagationStopped(); )
                                (a.rnamespace && !a.rnamespace.test(o.namespace)) ||
                                    ((a.handleObj = o), (a.data = o.data), void 0 !== (r = ((Ce.event.special[o.origType] || {}).handle || o.handler).apply(i.elem, u)) && !1 === (a.result = r) && (a.preventDefault(), a.stopPropagation()));
                        return c.postDispatch && c.postDispatch.call(this, a), a.result;
                    }
                },
                handlers: function (e, t) {
                    var n,
                        r,
                        i,
                        o,
                        s,
                        a = [],
                        u = t.delegateCount,
                        l = e.target;
                    if (u && l.nodeType && !("click" === e.type && e.button >= 1))
                        for (; l !== this; l = l.parentNode || this)
                            if (1 === l.nodeType && ("click" !== e.type || !0 !== l.disabled)) {
                                for (o = [], s = {}, n = 0; n < u; n++) (r = t[n]), (i = r.selector + " "), void 0 === s[i] && (s[i] = r.needsContext ? Ce(i, this).index(l) > -1 : Ce.find(i, this, null, [l]).length), s[i] && o.push(r);
                                o.length && a.push({ elem: l, handlers: o });
                            }
                    return (l = this), u < t.length && a.push({ elem: l, handlers: t.slice(u) }), a;
                },
                addProp: function (e, t) {
                    Object.defineProperty(Ce.Event.prototype, e, {
                        enumerable: !0,
                        configurable: !0,
                        get: Te(t)
                            ? function () {
                                  if (this.originalEvent) return t(this.originalEvent);
                              }
                            : function () {
                                  if (this.originalEvent) return this.originalEvent[e];
                              },
                        set: function (t) {
                            Object.defineProperty(this, e, { enumerable: !0, configurable: !0, writable: !0, value: t });
                        },
                    });
                },
                fix: function (e) {
                    return e[Ce.expando] ? e : new Ce.Event(e);
                },
                special: {
                    load: { noBubble: !0 },
                    focus: {
                        trigger: function () {
                            if (this !== D() && this.focus) return this.focus(), !1;
                        },
                        delegateType: "focusin",
                    },
                    blur: {
                        trigger: function () {
                            if (this === D() && this.blur) return this.blur(), !1;
                        },
                        delegateType: "focusout",
                    },
                    click: {
                        trigger: function () {
                            if ("checkbox" === this.type && this.click && l(this, "input")) return this.click(), !1;
                        },
                        _default: function (e) {
                            return l(e.target, "a");
                        },
                    },
                    beforeunload: {
                        postDispatch: function (e) {
                            void 0 !== e.result && e.originalEvent && (e.originalEvent.returnValue = e.result);
                        },
                    },
                },
            }),
                (Ce.removeEvent = function (e, t, n) {
                    e.removeEventListener && e.removeEventListener(t, n);
                }),
                (Ce.Event = function (e, t) {
                    if (!(this instanceof Ce.Event)) return new Ce.Event(e, t);
                    e && e.type
                        ? ((this.originalEvent = e),
                          (this.type = e.type),
                          (this.isDefaultPrevented = e.defaultPrevented || (void 0 === e.defaultPrevented && !1 === e.returnValue) ? j : N),
                          (this.target = e.target && 3 === e.target.nodeType ? e.target.parentNode : e.target),
                          (this.currentTarget = e.currentTarget),
                          (this.relatedTarget = e.relatedTarget))
                        : (this.type = e),
                        t && Ce.extend(this, t),
                        (this.timeStamp = (e && e.timeStamp) || Date.now()),
                        (this[Ce.expando] = !0);
                }),
                (Ce.Event.prototype = {
                    constructor: Ce.Event,
                    isDefaultPrevented: N,
                    isPropagationStopped: N,
                    isImmediatePropagationStopped: N,
                    isSimulated: !1,
                    preventDefault: function () {
                        var e = this.originalEvent;
                        (this.isDefaultPrevented = j), e && !this.isSimulated && e.preventDefault();
                    },
                    stopPropagation: function () {
                        var e = this.originalEvent;
                        (this.isPropagationStopped = j), e && !this.isSimulated && e.stopPropagation();
                    },
                    stopImmediatePropagation: function () {
                        var e = this.originalEvent;
                        (this.isImmediatePropagationStopped = j), e && !this.isSimulated && e.stopImmediatePropagation(), this.stopPropagation();
                    },
                }),
                Ce.each(
                    {
                        altKey: !0,
                        bubbles: !0,
                        cancelable: !0,
                        changedTouches: !0,
                        ctrlKey: !0,
                        detail: !0,
                        eventPhase: !0,
                        metaKey: !0,
                        pageX: !0,
                        pageY: !0,
                        shiftKey: !0,
                        view: !0,
                        char: !0,
                        charCode: !0,
                        key: !0,
                        keyCode: !0,
                        button: !0,
                        buttons: !0,
                        clientX: !0,
                        clientY: !0,
                        offsetX: !0,
                        offsetY: !0,
                        pointerId: !0,
                        pointerType: !0,
                        screenX: !0,
                        screenY: !0,
                        targetTouches: !0,
                        toElement: !0,
                        touches: !0,
                        which: function (e) {
                            var t = e.button;
                            return null == e.which && ot.test(e.type) ? (null != e.charCode ? e.charCode : e.keyCode) : !e.which && void 0 !== t && st.test(e.type) ? (1 & t ? 1 : 2 & t ? 3 : 4 & t ? 2 : 0) : e.which;
                        },
                    },
                    Ce.event.addProp
                ),
                Ce.each({ mouseenter: "mouseover", mouseleave: "mouseout", pointerenter: "pointerover", pointerleave: "pointerout" }, function (e, t) {
                    Ce.event.special[e] = {
                        delegateType: t,
                        bindType: t,
                        handle: function (e) {
                            var n,
                                r = this,
                                i = e.relatedTarget,
                                o = e.handleObj;
                            return (i && (i === r || Ce.contains(r, i))) || ((e.type = o.origType), (n = o.handler.apply(this, arguments)), (e.type = t)), n;
                        },
                    };
                }),
                Ce.fn.extend({
                    on: function (e, t, n, r) {
                        return L(this, e, t, n, r);
                    },
                    one: function (e, t, n, r) {
                        return L(this, e, t, n, r, 1);
                    },
                    off: function (e, t, n) {
                        var r, i;
                        if (e && e.preventDefault && e.handleObj) return (r = e.handleObj), Ce(e.delegateTarget).off(r.namespace ? r.origType + "." + r.namespace : r.origType, r.selector, r.handler), this;
                        if ("object" == typeof e) {
                            for (i in e) this.off(i, t, e[i]);
                            return this;
                        }
                        return (
                            (!1 !== t && "function" != typeof t) || ((n = t), (t = void 0)),
                            !1 === n && (n = N),
                            this.each(function () {
                                Ce.event.remove(this, e, n, t);
                            })
                        );
                    },
                });
            var ut = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([a-z][^\/\0>\x20\t\r\n\f]*)[^>]*)\/>/gi,
                lt = /<script|<style|<link/i,
                ct = /checked\s*(?:[^=]|=\s*.checked.)/i,
                ft = /^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g;
            Ce.extend({
                htmlPrefilter: function (e) {
                    return e.replace(ut, "<$1></$2>");
                },
                clone: function (e, t, n) {
                    var r,
                        i,
                        o,
                        s,
                        a = e.cloneNode(!0),
                        u = Ce.contains(e.ownerDocument, e);
                    if (!(we.noCloneChecked || (1 !== e.nodeType && 11 !== e.nodeType) || Ce.isXMLDoc(e))) for (s = C(a), o = C(e), r = 0, i = o.length; r < i; r++) $(o[r], s[r]);
                    if (t)
                        if (n) for (o = o || C(e), s = s || C(a), r = 0, i = o.length; r < i; r++) P(o[r], s[r]);
                        else P(e, a);
                    return (s = C(a, "script")), s.length > 0 && A(s, !u && C(e, "script")), a;
                },
                cleanData: function (e) {
                    for (var t, n, r, i = Ce.event.special, o = 0; void 0 !== (n = e[o]); o++)
                        if (Be(n)) {
                            if ((t = n[_e.expando])) {
                                if (t.events) for (r in t.events) i[r] ? Ce.event.remove(n, r) : Ce.removeEvent(n, r, t.handle);
                                n[_e.expando] = void 0;
                            }
                            n[We.expando] && (n[We.expando] = void 0);
                        }
                },
            }),
                Ce.fn.extend({
                    detach: function (e) {
                        return F(this, e, !0);
                    },
                    remove: function (e) {
                        return F(this, e);
                    },
                    text: function (e) {
                        return Me(
                            this,
                            function (e) {
                                return void 0 === e
                                    ? Ce.text(this)
                                    : this.empty().each(function () {
                                          (1 !== this.nodeType && 11 !== this.nodeType && 9 !== this.nodeType) || (this.textContent = e);
                                      });
                            },
                            null,
                            e,
                            arguments.length
                        );
                    },
                    append: function () {
                        return I(this, arguments, function (e) {
                            if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                                O(this, e).appendChild(e);
                            }
                        });
                    },
                    prepend: function () {
                        return I(this, arguments, function (e) {
                            if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                                var t = O(this, e);
                                t.insertBefore(e, t.firstChild);
                            }
                        });
                    },
                    before: function () {
                        return I(this, arguments, function (e) {
                            this.parentNode && this.parentNode.insertBefore(e, this);
                        });
                    },
                    after: function () {
                        return I(this, arguments, function (e) {
                            this.parentNode && this.parentNode.insertBefore(e, this.nextSibling);
                        });
                    },
                    empty: function () {
                        for (var e, t = 0; null != (e = this[t]); t++) 1 === e.nodeType && (Ce.cleanData(C(e, !1)), (e.textContent = ""));
                        return this;
                    },
                    clone: function (e, t) {
                        return (
                            (e = null != e && e),
                            (t = null == t ? e : t),
                            this.map(function () {
                                return Ce.clone(this, e, t);
                            })
                        );
                    },
                    html: function (e) {
                        return Me(
                            this,
                            function (e) {
                                var t = this[0] || {},
                                    n = 0,
                                    r = this.length;
                                if (void 0 === e && 1 === t.nodeType) return t.innerHTML;
                                if ("string" == typeof e && !lt.test(e) && !nt[(et.exec(e) || ["", ""])[1].toLowerCase()]) {
                                    e = Ce.htmlPrefilter(e);
                                    try {
                                        for (; n < r; n++) (t = this[n] || {}), 1 === t.nodeType && (Ce.cleanData(C(t, !1)), (t.innerHTML = e));
                                        t = 0;
                                    } catch (e) {}
                                }
                                t && this.empty().append(e);
                            },
                            null,
                            e,
                            arguments.length
                        );
                    },
                    replaceWith: function () {
                        var e = [];
                        return I(
                            this,
                            arguments,
                            function (t) {
                                var n = this.parentNode;
                                Ce.inArray(this, e) < 0 && (Ce.cleanData(C(this)), n && n.replaceChild(t, this));
                            },
                            e
                        );
                    },
                }),
                Ce.each({ appendTo: "append", prependTo: "prepend", insertBefore: "before", insertAfter: "after", replaceAll: "replaceWith" }, function (e, t) {
                    Ce.fn[e] = function (e) {
                        for (var n, r = [], i = Ce(e), o = i.length - 1, s = 0; s <= o; s++) (n = s === o ? this : this.clone(!0)), Ce(i[s])[t](n), he.apply(r, n.get());
                        return this.pushStack(r);
                    };
                });
            var pt = new RegExp("^(" + Ye + ")(?!px)[a-z%]+$", "i"),
                dt = function (e) {
                    var t = e.ownerDocument.defaultView;
                    return (t && t.opener) || (t = n), t.getComputedStyle(e);
                },
                ht = new RegExp(Ge.join("|"), "i");
            !(function () {
                function e() {
                    if (l) {
                        (u.style.cssText = "position:absolute;left:-11111px;width:60px;margin-top:1px;padding:0;border:0"),
                            (l.style.cssText = "position:relative;display:block;box-sizing:border-box;overflow:scroll;margin:auto;border:1px;padding:1px;width:60%;top:1%"),
                            it.appendChild(u).appendChild(l);
                        var e = n.getComputedStyle(l);
                        (r = "1%" !== e.top),
                            (a = 12 === t(e.marginLeft)),
                            (l.style.right = "60%"),
                            (s = 36 === t(e.right)),
                            (i = 36 === t(e.width)),
                            (l.style.position = "absolute"),
                            (o = 36 === l.offsetWidth || "absolute"),
                            it.removeChild(u),
                            (l = null);
                    }
                }
                function t(e) {
                    return Math.round(parseFloat(e));
                }
                var r,
                    i,
                    o,
                    s,
                    a,
                    u = ce.createElement("div"),
                    l = ce.createElement("div");
                l.style &&
                    ((l.style.backgroundClip = "content-box"),
                    (l.cloneNode(!0).style.backgroundClip = ""),
                    (we.clearCloneStyle = "content-box" === l.style.backgroundClip),
                    Ce.extend(we, {
                        boxSizingReliable: function () {
                            return e(), i;
                        },
                        pixelBoxStyles: function () {
                            return e(), s;
                        },
                        pixelPosition: function () {
                            return e(), r;
                        },
                        reliableMarginLeft: function () {
                            return e(), a;
                        },
                        scrollboxSize: function () {
                            return e(), o;
                        },
                    }));
            })();
            var gt = /^(none|table(?!-c[ea]).+)/,
                mt = /^--/,
                vt = { position: "absolute", visibility: "hidden", display: "block" },
                yt = { letterSpacing: "0", fontWeight: "400" },
                xt = ["Webkit", "Moz", "ms"],
                bt = ce.createElement("div").style;
            Ce.extend({
                cssHooks: {
                    opacity: {
                        get: function (e, t) {
                            if (t) {
                                var n = M(e, "opacity");
                                return "" === n ? "1" : n;
                            }
                        },
                    },
                },
                cssNumber: { animationIterationCount: !0, columnCount: !0, fillOpacity: !0, flexGrow: !0, flexShrink: !0, fontWeight: !0, lineHeight: !0, opacity: !0, order: !0, orphans: !0, widows: !0, zIndex: !0, zoom: !0 },
                cssProps: {},
                style: function (e, t, n, r) {
                    if (e && 3 !== e.nodeType && 8 !== e.nodeType && e.style) {
                        var i,
                            o,
                            s,
                            a = y(t),
                            u = mt.test(t),
                            l = e.style;
                        if ((u || (t = B(a)), (s = Ce.cssHooks[t] || Ce.cssHooks[a]), void 0 === n)) return s && "get" in s && void 0 !== (i = s.get(e, !1, r)) ? i : l[t];
                        (o = typeof n),
                            "string" === o && (i = Xe.exec(n)) && i[1] && ((n = T(e, t, i)), (o = "number")),
                            null != n &&
                                n === n &&
                                ("number" === o && (n += (i && i[3]) || (Ce.cssNumber[a] ? "" : "px")),
                                we.clearCloneStyle || "" !== n || 0 !== t.indexOf("background") || (l[t] = "inherit"),
                                (s && "set" in s && void 0 === (n = s.set(e, n, r))) || (u ? l.setProperty(t, n) : (l[t] = n)));
                    }
                },
                css: function (e, t, n, r) {
                    var i,
                        o,
                        s,
                        a = y(t);
                    return (
                        mt.test(t) || (t = B(a)),
                        (s = Ce.cssHooks[t] || Ce.cssHooks[a]),
                        s && "get" in s && (i = s.get(e, !0, n)),
                        void 0 === i && (i = M(e, t, r)),
                        "normal" === i && t in yt && (i = yt[t]),
                        "" === n || n ? ((o = parseFloat(i)), !0 === n || isFinite(o) ? o || 0 : i) : i
                    );
                },
            }),
                Ce.each(["height", "width"], function (e, t) {
                    Ce.cssHooks[t] = {
                        get: function (e, n, r) {
                            if (n)
                                return !gt.test(Ce.css(e, "display")) || (e.getClientRects().length && e.getBoundingClientRect().width)
                                    ? U(e, t, r)
                                    : Qe(e, vt, function () {
                                          return U(e, t, r);
                                      });
                        },
                        set: function (e, n, r) {
                            var i,
                                o = dt(e),
                                s = "border-box" === Ce.css(e, "boxSizing", !1, o),
                                a = r && W(e, t, r, s, o);
                            return (
                                s && we.scrollboxSize() === o.position && (a -= Math.ceil(e["offset" + t[0].toUpperCase() + t.slice(1)] - parseFloat(o[t]) - W(e, t, "border", !1, o) - 0.5)),
                                a && (i = Xe.exec(n)) && "px" !== (i[3] || "px") && ((e.style[t] = n), (n = Ce.css(e, t))),
                                _(e, n, a)
                            );
                        },
                    };
                }),
                (Ce.cssHooks.marginLeft = R(we.reliableMarginLeft, function (e, t) {
                    if (t)
                        return (
                            (parseFloat(M(e, "marginLeft")) ||
                                e.getBoundingClientRect().left -
                                    Qe(e, { marginLeft: 0 }, function () {
                                        return e.getBoundingClientRect().left;
                                    })) + "px"
                        );
                })),
                Ce.each({ margin: "", padding: "", border: "Width" }, function (e, t) {
                    (Ce.cssHooks[e + t] = {
                        expand: function (n) {
                            for (var r = 0, i = {}, o = "string" == typeof n ? n.split(" ") : [n]; r < 4; r++) i[e + Ge[r] + t] = o[r] || o[r - 2] || o[0];
                            return i;
                        },
                    }),
                        "margin" !== e && (Ce.cssHooks[e + t].set = _);
                }),
                Ce.fn.extend({
                    css: function (e, t) {
                        return Me(
                            this,
                            function (e, t, n) {
                                var r,
                                    i,
                                    o = {},
                                    s = 0;
                                if (Array.isArray(t)) {
                                    for (r = dt(e), i = t.length; s < i; s++) o[t[s]] = Ce.css(e, t[s], !1, r);
                                    return o;
                                }
                                return void 0 !== n ? Ce.style(e, t, n) : Ce.css(e, t);
                            },
                            e,
                            t,
                            arguments.length > 1
                        );
                    },
                }),
                (Ce.Tween = V),
                (V.prototype = {
                    constructor: V,
                    init: function (e, t, n, r, i, o) {
                        (this.elem = e), (this.prop = n), (this.easing = i || Ce.easing._default), (this.options = t), (this.start = this.now = this.cur()), (this.end = r), (this.unit = o || (Ce.cssNumber[n] ? "" : "px"));
                    },
                    cur: function () {
                        var e = V.propHooks[this.prop];
                        return e && e.get ? e.get(this) : V.propHooks._default.get(this);
                    },
                    run: function (e) {
                        var t,
                            n = V.propHooks[this.prop];
                        return (
                            this.options.duration ? (this.pos = t = Ce.easing[this.easing](e, this.options.duration * e, 0, 1, this.options.duration)) : (this.pos = t = e),
                            (this.now = (this.end - this.start) * t + this.start),
                            this.options.step && this.options.step.call(this.elem, this.now, this),
                            n && n.set ? n.set(this) : V.propHooks._default.set(this),
                            this
                        );
                    },
                }),
                (V.prototype.init.prototype = V.prototype),
                (V.propHooks = {
                    _default: {
                        get: function (e) {
                            var t;
                            return 1 !== e.elem.nodeType || (null != e.elem[e.prop] && null == e.elem.style[e.prop]) ? e.elem[e.prop] : ((t = Ce.css(e.elem, e.prop, "")), t && "auto" !== t ? t : 0);
                        },
                        set: function (e) {
                            Ce.fx.step[e.prop] ? Ce.fx.step[e.prop](e) : 1 !== e.elem.nodeType || (null == e.elem.style[Ce.cssProps[e.prop]] && !Ce.cssHooks[e.prop]) ? (e.elem[e.prop] = e.now) : Ce.style(e.elem, e.prop, e.now + e.unit);
                        },
                    },
                }),
                (V.propHooks.scrollTop = V.propHooks.scrollLeft = {
                    set: function (e) {
                        e.elem.nodeType && e.elem.parentNode && (e.elem[e.prop] = e.now);
                    },
                }),
                (Ce.easing = {
                    linear: function (e) {
                        return e;
                    },
                    swing: function (e) {
                        return 0.5 - Math.cos(e * Math.PI) / 2;
                    },
                    _default: "swing",
                }),
                (Ce.fx = V.prototype.init),
                (Ce.fx.step = {});
            var wt,
                Tt,
                kt = /^(?:toggle|show|hide)$/,
                Et = /queueHooks$/;
            (Ce.Animation = Ce.extend(K, {
                tweeners: {
                    "*": [
                        function (e, t) {
                            var n = this.createTween(e, t);
                            return T(n.elem, e, Xe.exec(t), n), n;
                        },
                    ],
                },
                tweener: function (e, t) {
                    Te(e) ? ((t = e), (e = ["*"])) : (e = e.match($e));
                    for (var n, r = 0, i = e.length; r < i; r++) (n = e[r]), (K.tweeners[n] = K.tweeners[n] || []), K.tweeners[n].unshift(t);
                },
                prefilters: [Q],
                prefilter: function (e, t) {
                    t ? K.prefilters.unshift(e) : K.prefilters.push(e);
                },
            })),
                (Ce.speed = function (e, t, n) {
                    var r = e && "object" == typeof e ? Ce.extend({}, e) : { complete: n || (!n && t) || (Te(e) && e), duration: e, easing: (n && t) || (t && !Te(t) && t) };
                    return (
                        Ce.fx.off ? (r.duration = 0) : "number" != typeof r.duration && (r.duration in Ce.fx.speeds ? (r.duration = Ce.fx.speeds[r.duration]) : (r.duration = Ce.fx.speeds._default)),
                        (null != r.queue && !0 !== r.queue) || (r.queue = "fx"),
                        (r.old = r.complete),
                        (r.complete = function () {
                            Te(r.old) && r.old.call(this), r.queue && Ce.dequeue(this, r.queue);
                        }),
                        r
                    );
                }),
                Ce.fn.extend({
                    fadeTo: function (e, t, n, r) {
                        return this.filter(Je).css("opacity", 0).show().end().animate({ opacity: t }, e, n, r);
                    },
                    animate: function (e, t, n, r) {
                        var i = Ce.isEmptyObject(e),
                            o = Ce.speed(t, n, r),
                            s = function () {
                                var t = K(this, Ce.extend({}, e), o);
                                (i || _e.get(this, "finish")) && t.stop(!0);
                            };
                        return (s.finish = s), i || !1 === o.queue ? this.each(s) : this.queue(o.queue, s);
                    },
                    stop: function (e, t, n) {
                        var r = function (e) {
                            var t = e.stop;
                            delete e.stop, t(n);
                        };
                        return (
                            "string" != typeof e && ((n = t), (t = e), (e = void 0)),
                            t && !1 !== e && this.queue(e || "fx", []),
                            this.each(function () {
                                var t = !0,
                                    i = null != e && e + "queueHooks",
                                    o = Ce.timers,
                                    s = _e.get(this);
                                if (i) s[i] && s[i].stop && r(s[i]);
                                else for (i in s) s[i] && s[i].stop && Et.test(i) && r(s[i]);
                                for (i = o.length; i--; ) o[i].elem !== this || (null != e && o[i].queue !== e) || (o[i].anim.stop(n), (t = !1), o.splice(i, 1));
                                (!t && n) || Ce.dequeue(this, e);
                            })
                        );
                    },
                    finish: function (e) {
                        return (
                            !1 !== e && (e = e || "fx"),
                            this.each(function () {
                                var t,
                                    n = _e.get(this),
                                    r = n[e + "queue"],
                                    i = n[e + "queueHooks"],
                                    o = Ce.timers,
                                    s = r ? r.length : 0;
                                for (n.finish = !0, Ce.queue(this, e, []), i && i.stop && i.stop.call(this, !0), t = o.length; t--; ) o[t].elem === this && o[t].queue === e && (o[t].anim.stop(!0), o.splice(t, 1));
                                for (t = 0; t < s; t++) r[t] && r[t].finish && r[t].finish.call(this);
                                delete n.finish;
                            })
                        );
                    },
                }),
                Ce.each(["toggle", "show", "hide"], function (e, t) {
                    var n = Ce.fn[t];
                    Ce.fn[t] = function (e, r, i) {
                        return null == e || "boolean" == typeof e ? n.apply(this, arguments) : this.animate(G(t, !0), e, r, i);
                    };
                }),
                Ce.each({ slideDown: G("show"), slideUp: G("hide"), slideToggle: G("toggle"), fadeIn: { opacity: "show" }, fadeOut: { opacity: "hide" }, fadeToggle: { opacity: "toggle" } }, function (e, t) {
                    Ce.fn[e] = function (e, n, r) {
                        return this.animate(t, e, n, r);
                    };
                }),
                (Ce.timers = []),
                (Ce.fx.tick = function () {
                    var e,
                        t = 0,
                        n = Ce.timers;
                    for (wt = Date.now(); t < n.length; t++) (e = n[t])() || n[t] !== e || n.splice(t--, 1);
                    n.length || Ce.fx.stop(), (wt = void 0);
                }),
                (Ce.fx.timer = function (e) {
                    Ce.timers.push(e), Ce.fx.start();
                }),
                (Ce.fx.interval = 13),
                (Ce.fx.start = function () {
                    Tt || ((Tt = !0), Y());
                }),
                (Ce.fx.stop = function () {
                    Tt = null;
                }),
                (Ce.fx.speeds = { slow: 600, fast: 200, _default: 400 }),
                (Ce.fn.delay = function (e, t) {
                    return (
                        (e = Ce.fx ? Ce.fx.speeds[e] || e : e),
                        (t = t || "fx"),
                        this.queue(t, function (t, r) {
                            var i = n.setTimeout(t, e);
                            r.stop = function () {
                                n.clearTimeout(i);
                            };
                        })
                    );
                }),
                (function () {
                    var e = ce.createElement("input"),
                        t = ce.createElement("select"),
                        n = t.appendChild(ce.createElement("option"));
                    (e.type = "checkbox"), (we.checkOn = "" !== e.value), (we.optSelected = n.selected), (e = ce.createElement("input")), (e.value = "t"), (e.type = "radio"), (we.radioValue = "t" === e.value);
                })();
            var Ct,
                At = Ce.expr.attrHandle;
            Ce.fn.extend({
                attr: function (e, t) {
                    return Me(this, Ce.attr, e, t, arguments.length > 1);
                },
                removeAttr: function (e) {
                    return this.each(function () {
                        Ce.removeAttr(this, e);
                    });
                },
            }),
                Ce.extend({
                    attr: function (e, t, n) {
                        var r,
                            i,
                            o = e.nodeType;
                        if (3 !== o && 8 !== o && 2 !== o)
                            return void 0 === e.getAttribute
                                ? Ce.prop(e, t, n)
                                : ((1 === o && Ce.isXMLDoc(e)) || (i = Ce.attrHooks[t.toLowerCase()] || (Ce.expr.match.bool.test(t) ? Ct : void 0)),
                                  void 0 !== n
                                      ? null === n
                                          ? void Ce.removeAttr(e, t)
                                          : i && "set" in i && void 0 !== (r = i.set(e, n, t))
                                          ? r
                                          : (e.setAttribute(t, n + ""), n)
                                      : i && "get" in i && null !== (r = i.get(e, t))
                                      ? r
                                      : ((r = Ce.find.attr(e, t)), null == r ? void 0 : r));
                    },
                    attrHooks: {
                        type: {
                            set: function (e, t) {
                                if (!we.radioValue && "radio" === t && l(e, "input")) {
                                    var n = e.value;
                                    return e.setAttribute("type", t), n && (e.value = n), t;
                                }
                            },
                        },
                    },
                    removeAttr: function (e, t) {
                        var n,
                            r = 0,
                            i = t && t.match($e);
                        if (i && 1 === e.nodeType) for (; (n = i[r++]); ) e.removeAttribute(n);
                    },
                }),
                (Ct = {
                    set: function (e, t, n) {
                        return !1 === t ? Ce.removeAttr(e, n) : e.setAttribute(n, n), n;
                    },
                }),
                Ce.each(Ce.expr.match.bool.source.match(/\w+/g), function (e, t) {
                    var n = At[t] || Ce.find.attr;
                    At[t] = function (e, t, r) {
                        var i,
                            o,
                            s = t.toLowerCase();
                        return r || ((o = At[s]), (At[s] = i), (i = null != n(e, t, r) ? s : null), (At[s] = o)), i;
                    };
                });
            var St = /^(?:input|select|textarea|button)$/i,
                jt = /^(?:a|area)$/i;
            Ce.fn.extend({
                prop: function (e, t) {
                    return Me(this, Ce.prop, e, t, arguments.length > 1);
                },
                removeProp: function (e) {
                    return this.each(function () {
                        delete this[Ce.propFix[e] || e];
                    });
                },
            }),
                Ce.extend({
                    prop: function (e, t, n) {
                        var r,
                            i,
                            o = e.nodeType;
                        if (3 !== o && 8 !== o && 2 !== o)
                            return (
                                (1 === o && Ce.isXMLDoc(e)) || ((t = Ce.propFix[t] || t), (i = Ce.propHooks[t])),
                                void 0 !== n ? (i && "set" in i && void 0 !== (r = i.set(e, n, t)) ? r : (e[t] = n)) : i && "get" in i && null !== (r = i.get(e, t)) ? r : e[t]
                            );
                    },
                    propHooks: {
                        tabIndex: {
                            get: function (e) {
                                var t = Ce.find.attr(e, "tabindex");
                                return t ? parseInt(t, 10) : St.test(e.nodeName) || (jt.test(e.nodeName) && e.href) ? 0 : -1;
                            },
                        },
                    },
                    propFix: { for: "htmlFor", class: "className" },
                }),
                we.optSelected ||
                    (Ce.propHooks.selected = {
                        get: function (e) {
                            var t = e.parentNode;
                            return t && t.parentNode && t.parentNode.selectedIndex, null;
                        },
                        set: function (e) {
                            var t = e.parentNode;
                            t && (t.selectedIndex, t.parentNode && t.parentNode.selectedIndex);
                        },
                    }),
                Ce.each(["tabIndex", "readOnly", "maxLength", "cellSpacing", "cellPadding", "rowSpan", "colSpan", "useMap", "frameBorder", "contentEditable"], function () {
                    Ce.propFix[this.toLowerCase()] = this;
                }),
                Ce.fn.extend({
                    addClass: function (e) {
                        var t,
                            n,
                            r,
                            i,
                            o,
                            s,
                            a,
                            u = 0;
                        if (Te(e))
                            return this.each(function (t) {
                                Ce(this).addClass(e.call(this, t, te(this)));
                            });
                        if (((t = ne(e)), t.length))
                            for (; (n = this[u++]); )
                                if (((i = te(n)), (r = 1 === n.nodeType && " " + ee(i) + " "))) {
                                    for (s = 0; (o = t[s++]); ) r.indexOf(" " + o + " ") < 0 && (r += o + " ");
                                    (a = ee(r)), i !== a && n.setAttribute("class", a);
                                }
                        return this;
                    },
                    removeClass: function (e) {
                        var t,
                            n,
                            r,
                            i,
                            o,
                            s,
                            a,
                            u = 0;
                        if (Te(e))
                            return this.each(function (t) {
                                Ce(this).removeClass(e.call(this, t, te(this)));
                            });
                        if (!arguments.length) return this.attr("class", "");
                        if (((t = ne(e)), t.length))
                            for (; (n = this[u++]); )
                                if (((i = te(n)), (r = 1 === n.nodeType && " " + ee(i) + " "))) {
                                    for (s = 0; (o = t[s++]); ) for (; r.indexOf(" " + o + " ") > -1; ) r = r.replace(" " + o + " ", " ");
                                    (a = ee(r)), i !== a && n.setAttribute("class", a);
                                }
                        return this;
                    },
                    toggleClass: function (e, t) {
                        var n = typeof e,
                            r = "string" === n || Array.isArray(e);
                        return "boolean" == typeof t && r
                            ? t
                                ? this.addClass(e)
                                : this.removeClass(e)
                            : Te(e)
                            ? this.each(function (n) {
                                  Ce(this).toggleClass(e.call(this, n, te(this), t), t);
                              })
                            : this.each(function () {
                                  var t, i, o, s;
                                  if (r) for (i = 0, o = Ce(this), s = ne(e); (t = s[i++]); ) o.hasClass(t) ? o.removeClass(t) : o.addClass(t);
                                  else (void 0 !== e && "boolean" !== n) || ((t = te(this)), t && _e.set(this, "__className__", t), this.setAttribute && this.setAttribute("class", t || !1 === e ? "" : _e.get(this, "__className__") || ""));
                              });
                    },
                    hasClass: function (e) {
                        var t,
                            n,
                            r = 0;
                        for (t = " " + e + " "; (n = this[r++]); ) if (1 === n.nodeType && (" " + ee(te(n)) + " ").indexOf(t) > -1) return !0;
                        return !1;
                    },
                });
            var Nt = /\r/g;
            Ce.fn.extend({
                val: function (e) {
                    var t,
                        n,
                        r,
                        i = this[0];
                    {
                        if (arguments.length)
                            return (
                                (r = Te(e)),
                                this.each(function (n) {
                                    var i;
                                    1 === this.nodeType &&
                                        ((i = r ? e.call(this, n, Ce(this).val()) : e),
                                        null == i
                                            ? (i = "")
                                            : "number" == typeof i
                                            ? (i += "")
                                            : Array.isArray(i) &&
                                              (i = Ce.map(i, function (e) {
                                                  return null == e ? "" : e + "";
                                              })),
                                        ((t = Ce.valHooks[this.type] || Ce.valHooks[this.nodeName.toLowerCase()]) && "set" in t && void 0 !== t.set(this, i, "value")) || (this.value = i));
                                })
                            );
                        if (i)
                            return (t = Ce.valHooks[i.type] || Ce.valHooks[i.nodeName.toLowerCase()]) && "get" in t && void 0 !== (n = t.get(i, "value")) ? n : ((n = i.value), "string" == typeof n ? n.replace(Nt, "") : null == n ? "" : n);
                    }
                },
            }),
                Ce.extend({
                    valHooks: {
                        option: {
                            get: function (e) {
                                var t = Ce.find.attr(e, "value");
                                return null != t ? t : ee(Ce.text(e));
                            },
                        },
                        select: {
                            get: function (e) {
                                var t,
                                    n,
                                    r,
                                    i = e.options,
                                    o = e.selectedIndex,
                                    s = "select-one" === e.type,
                                    a = s ? null : [],
                                    u = s ? o + 1 : i.length;
                                for (r = o < 0 ? u : s ? o : 0; r < u; r++)
                                    if (((n = i[r]), (n.selected || r === o) && !n.disabled && (!n.parentNode.disabled || !l(n.parentNode, "optgroup")))) {
                                        if (((t = Ce(n).val()), s)) return t;
                                        a.push(t);
                                    }
                                return a;
                            },
                            set: function (e, t) {
                                for (var n, r, i = e.options, o = Ce.makeArray(t), s = i.length; s--; ) (r = i[s]), (r.selected = Ce.inArray(Ce.valHooks.option.get(r), o) > -1) && (n = !0);
                                return n || (e.selectedIndex = -1), o;
                            },
                        },
                    },
                }),
                Ce.each(["radio", "checkbox"], function () {
                    (Ce.valHooks[this] = {
                        set: function (e, t) {
                            if (Array.isArray(t)) return (e.checked = Ce.inArray(Ce(e).val(), t) > -1);
                        },
                    }),
                        we.checkOn ||
                            (Ce.valHooks[this].get = function (e) {
                                return null === e.getAttribute("value") ? "on" : e.value;
                            });
                }),
                (we.focusin = "onfocusin" in n);
            var Dt = /^(?:focusinfocus|focusoutblur)$/,
                Lt = function (e) {
                    e.stopPropagation();
                };
            Ce.extend(Ce.event, {
                trigger: function (e, t, r, i) {
                    var o,
                        s,
                        a,
                        u,
                        l,
                        c,
                        f,
                        p,
                        d = [r || ce],
                        h = ye.call(e, "type") ? e.type : e,
                        g = ye.call(e, "namespace") ? e.namespace.split(".") : [];
                    if (
                        ((s = p = a = r = r || ce),
                        3 !== r.nodeType &&
                            8 !== r.nodeType &&
                            !Dt.test(h + Ce.event.triggered) &&
                            (h.indexOf(".") > -1 && ((g = h.split(".")), (h = g.shift()), g.sort()),
                            (l = h.indexOf(":") < 0 && "on" + h),
                            (e = e[Ce.expando] ? e : new Ce.Event(h, "object" == typeof e && e)),
                            (e.isTrigger = i ? 2 : 3),
                            (e.namespace = g.join(".")),
                            (e.rnamespace = e.namespace ? new RegExp("(^|\\.)" + g.join("\\.(?:.*\\.|)") + "(\\.|$)") : null),
                            (e.result = void 0),
                            e.target || (e.target = r),
                            (t = null == t ? [e] : Ce.makeArray(t, [e])),
                            (f = Ce.event.special[h] || {}),
                            i || !f.trigger || !1 !== f.trigger.apply(r, t)))
                    ) {
                        if (!i && !f.noBubble && !ke(r)) {
                            for (u = f.delegateType || h, Dt.test(u + h) || (s = s.parentNode); s; s = s.parentNode) d.push(s), (a = s);
                            a === (r.ownerDocument || ce) && d.push(a.defaultView || a.parentWindow || n);
                        }
                        for (o = 0; (s = d[o++]) && !e.isPropagationStopped(); )
                            (p = s),
                                (e.type = o > 1 ? u : f.bindType || h),
                                (c = (_e.get(s, "events") || {})[e.type] && _e.get(s, "handle")),
                                c && c.apply(s, t),
                                (c = l && s[l]) && c.apply && Be(s) && ((e.result = c.apply(s, t)), !1 === e.result && e.preventDefault());
                        return (
                            (e.type = h),
                            i ||
                                e.isDefaultPrevented() ||
                                (f._default && !1 !== f._default.apply(d.pop(), t)) ||
                                !Be(r) ||
                                (l &&
                                    Te(r[h]) &&
                                    !ke(r) &&
                                    ((a = r[l]),
                                    a && (r[l] = null),
                                    (Ce.event.triggered = h),
                                    e.isPropagationStopped() && p.addEventListener(h, Lt),
                                    r[h](),
                                    e.isPropagationStopped() && p.removeEventListener(h, Lt),
                                    (Ce.event.triggered = void 0),
                                    a && (r[l] = a))),
                            e.result
                        );
                    }
                },
                simulate: function (e, t, n) {
                    var r = Ce.extend(new Ce.Event(), n, { type: e, isSimulated: !0 });
                    Ce.event.trigger(r, null, t);
                },
            }),
                Ce.fn.extend({
                    trigger: function (e, t) {
                        return this.each(function () {
                            Ce.event.trigger(e, t, this);
                        });
                    },
                    triggerHandler: function (e, t) {
                        var n = this[0];
                        if (n) return Ce.event.trigger(e, t, n, !0);
                    },
                }),
                we.focusin ||
                    Ce.each({ focus: "focusin", blur: "focusout" }, function (e, t) {
                        var n = function (e) {
                            Ce.event.simulate(t, e.target, Ce.event.fix(e));
                        };
                        Ce.event.special[t] = {
                            setup: function () {
                                var r = this.ownerDocument || this,
                                    i = _e.access(r, t);
                                i || r.addEventListener(e, n, !0), _e.access(r, t, (i || 0) + 1);
                            },
                            teardown: function () {
                                var r = this.ownerDocument || this,
                                    i = _e.access(r, t) - 1;
                                i ? _e.access(r, t, i) : (r.removeEventListener(e, n, !0), _e.remove(r, t));
                            },
                        };
                    });
            var Ot = n.location,
                qt = Date.now(),
                Ht = /\?/;
            Ce.parseXML = function (e) {
                var t;
                if (!e || "string" != typeof e) return null;
                try {
                    t = new n.DOMParser().parseFromString(e, "text/xml");
                } catch (e) {
                    t = void 0;
                }
                return (t && !t.getElementsByTagName("parsererror").length) || Ce.error("Invalid XML: " + e), t;
            };
            var Pt = /\[\]$/,
                $t = /\r?\n/g,
                It = /^(?:submit|button|image|reset|file)$/i,
                Ft = /^(?:input|select|textarea|keygen)/i;
            (Ce.param = function (e, t) {
                var n,
                    r = [],
                    i = function (e, t) {
                        var n = Te(t) ? t() : t;
                        r[r.length] = encodeURIComponent(e) + "=" + encodeURIComponent(null == n ? "" : n);
                    };
                if (Array.isArray(e) || (e.jquery && !Ce.isPlainObject(e)))
                    Ce.each(e, function () {
                        i(this.name, this.value);
                    });
                else for (n in e) re(n, e[n], t, i);
                return r.join("&");
            }),
                Ce.fn.extend({
                    serialize: function () {
                        return Ce.param(this.serializeArray());
                    },
                    serializeArray: function () {
                        return this.map(function () {
                            var e = Ce.prop(this, "elements");
                            return e ? Ce.makeArray(e) : this;
                        })
                            .filter(function () {
                                var e = this.type;
                                return this.name && !Ce(this).is(":disabled") && Ft.test(this.nodeName) && !It.test(e) && (this.checked || !Ke.test(e));
                            })
                            .map(function (e, t) {
                                var n = Ce(this).val();
                                return null == n
                                    ? null
                                    : Array.isArray(n)
                                    ? Ce.map(n, function (e) {
                                          return { name: t.name, value: e.replace($t, "\r\n") };
                                      })
                                    : { name: t.name, value: n.replace($t, "\r\n") };
                            })
                            .get();
                    },
                });
            var Mt = /%20/g,
                Rt = /#.*$/,
                zt = /([?&])_=[^&]*/,
                Bt = /^(.*?):[ \t]*([^\r\n]*)$/gm,
                _t = /^(?:about|app|app-storage|.+-extension|file|res|widget):$/,
                Wt = /^(?:GET|HEAD)$/,
                Ut = /^\/\//,
                Vt = {},
                Yt = {},
                Xt = "*/".concat("*"),
                Gt = ce.createElement("a");
            (Gt.href = Ot.href),
                Ce.extend({
                    active: 0,
                    lastModified: {},
                    etag: {},
                    ajaxSettings: {
                        url: Ot.href,
                        type: "GET",
                        isLocal: _t.test(Ot.protocol),
                        global: !0,
                        processData: !0,
                        async: !0,
                        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                        accepts: { "*": Xt, text: "text/plain", html: "text/html", xml: "application/xml, text/xml", json: "application/json, text/javascript" },
                        contents: { xml: /\bxml\b/, html: /\bhtml/, json: /\bjson\b/ },
                        responseFields: { xml: "responseXML", text: "responseText", json: "responseJSON" },
                        converters: { "* text": String, "text html": !0, "text json": JSON.parse, "text xml": Ce.parseXML },
                        flatOptions: { url: !0, context: !0 },
                    },
                    ajaxSetup: function (e, t) {
                        return t ? se(se(e, Ce.ajaxSettings), t) : se(Ce.ajaxSettings, e);
                    },
                    ajaxPrefilter: ie(Vt),
                    ajaxTransport: ie(Yt),
                    ajax: function (e, t) {
                        function r(e, t, r, a) {
                            var l,
                                p,
                                d,
                                b,
                                w,
                                T = t;
                            c ||
                                ((c = !0),
                                u && n.clearTimeout(u),
                                (i = void 0),
                                (s = a || ""),
                                (k.readyState = e > 0 ? 4 : 0),
                                (l = (e >= 200 && e < 300) || 304 === e),
                                r && (b = ae(h, k, r)),
                                (b = ue(h, b, k, l)),
                                l
                                    ? (h.ifModified && ((w = k.getResponseHeader("Last-Modified")), w && (Ce.lastModified[o] = w), (w = k.getResponseHeader("etag")) && (Ce.etag[o] = w)),
                                      204 === e || "HEAD" === h.type ? (T = "nocontent") : 304 === e ? (T = "notmodified") : ((T = b.state), (p = b.data), (d = b.error), (l = !d)))
                                    : ((d = T), (!e && T) || ((T = "error"), e < 0 && (e = 0))),
                                (k.status = e),
                                (k.statusText = (t || T) + ""),
                                l ? v.resolveWith(g, [p, T, k]) : v.rejectWith(g, [k, T, d]),
                                k.statusCode(x),
                                (x = void 0),
                                f && m.trigger(l ? "ajaxSuccess" : "ajaxError", [k, h, l ? p : d]),
                                y.fireWith(g, [k, T]),
                                f && (m.trigger("ajaxComplete", [k, h]), --Ce.active || Ce.event.trigger("ajaxStop")));
                        }
                        "object" == typeof e && ((t = e), (e = void 0)), (t = t || {});
                        var i,
                            o,
                            s,
                            a,
                            u,
                            l,
                            c,
                            f,
                            p,
                            d,
                            h = Ce.ajaxSetup({}, t),
                            g = h.context || h,
                            m = h.context && (g.nodeType || g.jquery) ? Ce(g) : Ce.event,
                            v = Ce.Deferred(),
                            y = Ce.Callbacks("once memory"),
                            x = h.statusCode || {},
                            b = {},
                            w = {},
                            T = "canceled",
                            k = {
                                readyState: 0,
                                getResponseHeader: function (e) {
                                    var t;
                                    if (c) {
                                        if (!a) for (a = {}; (t = Bt.exec(s)); ) a[t[1].toLowerCase()] = t[2];
                                        t = a[e.toLowerCase()];
                                    }
                                    return null == t ? null : t;
                                },
                                getAllResponseHeaders: function () {
                                    return c ? s : null;
                                },
                                setRequestHeader: function (e, t) {
                                    return null == c && ((e = w[e.toLowerCase()] = w[e.toLowerCase()] || e), (b[e] = t)), this;
                                },
                                overrideMimeType: function (e) {
                                    return null == c && (h.mimeType = e), this;
                                },
                                statusCode: function (e) {
                                    var t;
                                    if (e)
                                        if (c) k.always(e[k.status]);
                                        else for (t in e) x[t] = [x[t], e[t]];
                                    return this;
                                },
                                abort: function (e) {
                                    var t = e || T;
                                    return i && i.abort(t), r(0, t), this;
                                },
                            };
                        if (
                            (v.promise(k),
                            (h.url = ((e || h.url || Ot.href) + "").replace(Ut, Ot.protocol + "//")),
                            (h.type = t.method || t.type || h.method || h.type),
                            (h.dataTypes = (h.dataType || "*").toLowerCase().match($e) || [""]),
                            null == h.crossDomain)
                        ) {
                            l = ce.createElement("a");
                            try {
                                (l.href = h.url), (l.href = l.href), (h.crossDomain = Gt.protocol + "//" + Gt.host != l.protocol + "//" + l.host);
                            } catch (e) {
                                h.crossDomain = !0;
                            }
                        }
                        if ((h.data && h.processData && "string" != typeof h.data && (h.data = Ce.param(h.data, h.traditional)), oe(Vt, h, t, k), c)) return k;
                        (f = Ce.event && h.global),
                            f && 0 == Ce.active++ && Ce.event.trigger("ajaxStart"),
                            (h.type = h.type.toUpperCase()),
                            (h.hasContent = !Wt.test(h.type)),
                            (o = h.url.replace(Rt, "")),
                            h.hasContent
                                ? h.data && h.processData && 0 === (h.contentType || "").indexOf("application/x-www-form-urlencoded") && (h.data = h.data.replace(Mt, "+"))
                                : ((d = h.url.slice(o.length)),
                                  h.data && (h.processData || "string" == typeof h.data) && ((o += (Ht.test(o) ? "&" : "?") + h.data), delete h.data),
                                  !1 === h.cache && ((o = o.replace(zt, "$1")), (d = (Ht.test(o) ? "&" : "?") + "_=" + qt++ + d)),
                                  (h.url = o + d)),
                            h.ifModified && (Ce.lastModified[o] && k.setRequestHeader("If-Modified-Since", Ce.lastModified[o]), Ce.etag[o] && k.setRequestHeader("If-None-Match", Ce.etag[o])),
                            ((h.data && h.hasContent && !1 !== h.contentType) || t.contentType) && k.setRequestHeader("Content-Type", h.contentType),
                            k.setRequestHeader("Accept", h.dataTypes[0] && h.accepts[h.dataTypes[0]] ? h.accepts[h.dataTypes[0]] + ("*" !== h.dataTypes[0] ? ", " + Xt + "; q=0.01" : "") : h.accepts["*"]);
                        for (p in h.headers) k.setRequestHeader(p, h.headers[p]);
                        if (h.beforeSend && (!1 === h.beforeSend.call(g, k, h) || c)) return k.abort();
                        if (((T = "abort"), y.add(h.complete), k.done(h.success), k.fail(h.error), (i = oe(Yt, h, t, k)))) {
                            if (((k.readyState = 1), f && m.trigger("ajaxSend", [k, h]), c)) return k;
                            h.async &&
                                h.timeout > 0 &&
                                (u = n.setTimeout(function () {
                                    k.abort("timeout");
                                }, h.timeout));
                            try {
                                (c = !1), i.send(b, r);
                            } catch (e) {
                                if (c) throw e;
                                r(-1, e);
                            }
                        } else r(-1, "No Transport");
                        return k;
                    },
                    getJSON: function (e, t, n) {
                        return Ce.get(e, t, n, "json");
                    },
                    getScript: function (e, t) {
                        return Ce.get(e, void 0, t, "script");
                    },
                }),
                Ce.each(["get", "post"], function (e, t) {
                    Ce[t] = function (e, n, r, i) {
                        return Te(n) && ((i = i || r), (r = n), (n = void 0)), Ce.ajax(Ce.extend({ url: e, type: t, dataType: i, data: n, success: r }, Ce.isPlainObject(e) && e));
                    };
                }),
                (Ce._evalUrl = function (e) {
                    return Ce.ajax({ url: e, type: "GET", dataType: "script", cache: !0, async: !1, global: !1, throws: !0 });
                }),
                Ce.fn.extend({
                    wrapAll: function (e) {
                        var t;
                        return (
                            this[0] &&
                                (Te(e) && (e = e.call(this[0])),
                                (t = Ce(e, this[0].ownerDocument).eq(0).clone(!0)),
                                this[0].parentNode && t.insertBefore(this[0]),
                                t
                                    .map(function () {
                                        for (var e = this; e.firstElementChild; ) e = e.firstElementChild;
                                        return e;
                                    })
                                    .append(this)),
                            this
                        );
                    },
                    wrapInner: function (e) {
                        return Te(e)
                            ? this.each(function (t) {
                                  Ce(this).wrapInner(e.call(this, t));
                              })
                            : this.each(function () {
                                  var t = Ce(this),
                                      n = t.contents();
                                  n.length ? n.wrapAll(e) : t.append(e);
                              });
                    },
                    wrap: function (e) {
                        var t = Te(e);
                        return this.each(function (n) {
                            Ce(this).wrapAll(t ? e.call(this, n) : e);
                        });
                    },
                    unwrap: function (e) {
                        return (
                            this.parent(e)
                                .not("body")
                                .each(function () {
                                    Ce(this).replaceWith(this.childNodes);
                                }),
                            this
                        );
                    },
                }),
                (Ce.expr.pseudos.hidden = function (e) {
                    return !Ce.expr.pseudos.visible(e);
                }),
                (Ce.expr.pseudos.visible = function (e) {
                    return !!(e.offsetWidth || e.offsetHeight || e.getClientRects().length);
                }),
                (Ce.ajaxSettings.xhr = function () {
                    try {
                        return new n.XMLHttpRequest();
                    } catch (e) {}
                });
            var Jt = { 0: 200, 1223: 204 },
                Qt = Ce.ajaxSettings.xhr();
            (we.cors = !!Qt && "withCredentials" in Qt),
                (we.ajax = Qt = !!Qt),
                Ce.ajaxTransport(function (e) {
                    var t, r;
                    if (we.cors || (Qt && !e.crossDomain))
                        return {
                            send: function (i, o) {
                                var s,
                                    a = e.xhr();
                                if ((a.open(e.type, e.url, e.async, e.username, e.password), e.xhrFields)) for (s in e.xhrFields) a[s] = e.xhrFields[s];
                                e.mimeType && a.overrideMimeType && a.overrideMimeType(e.mimeType), e.crossDomain || i["X-Requested-With"] || (i["X-Requested-With"] = "XMLHttpRequest");
                                for (s in i) a.setRequestHeader(s, i[s]);
                                (t = function (e) {
                                    return function () {
                                        t &&
                                            ((t = r = a.onload = a.onerror = a.onabort = a.ontimeout = a.onreadystatechange = null),
                                            "abort" === e
                                                ? a.abort()
                                                : "error" === e
                                                ? "number" != typeof a.status
                                                    ? o(0, "error")
                                                    : o(a.status, a.statusText)
                                                : o(
                                                      Jt[a.status] || a.status,
                                                      a.statusText,
                                                      "text" !== (a.responseType || "text") || "string" != typeof a.responseText ? { binary: a.response } : { text: a.responseText },
                                                      a.getAllResponseHeaders()
                                                  ));
                                    };
                                }),
                                    (a.onload = t()),
                                    (r = a.onerror = a.ontimeout = t("error")),
                                    void 0 !== a.onabort
                                        ? (a.onabort = r)
                                        : (a.onreadystatechange = function () {
                                              4 === a.readyState &&
                                                  n.setTimeout(function () {
                                                      t && r();
                                                  });
                                          }),
                                    (t = t("abort"));
                                try {
                                    a.send((e.hasContent && e.data) || null);
                                } catch (e) {
                                    if (t) throw e;
                                }
                            },
                            abort: function () {
                                t && t();
                            },
                        };
                }),
                Ce.ajaxPrefilter(function (e) {
                    e.crossDomain && (e.contents.script = !1);
                }),
                Ce.ajaxSetup({
                    accepts: { script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript" },
                    contents: { script: /\b(?:java|ecma)script\b/ },
                    converters: {
                        "text script": function (e) {
                            return Ce.globalEval(e), e;
                        },
                    },
                }),
                Ce.ajaxPrefilter("script", function (e) {
                    void 0 === e.cache && (e.cache = !1), e.crossDomain && (e.type = "GET");
                }),
                Ce.ajaxTransport("script", function (e) {
                    if (e.crossDomain) {
                        var t, n;
                        return {
                            send: function (r, i) {
                                (t = Ce("<script>")
                                    .prop({ charset: e.scriptCharset, src: e.url })
                                    .on(
                                        "load error",
                                        (n = function (e) {
                                            t.remove(), (n = null), e && i("error" === e.type ? 404 : 200, e.type);
                                        })
                                    )),
                                    ce.head.appendChild(t[0]);
                            },
                            abort: function () {
                                n && n();
                            },
                        };
                    }
                });
            var Zt = [],
                Kt = /(=)\?(?=&|$)|\?\?/;
            Ce.ajaxSetup({
                jsonp: "callback",
                jsonpCallback: function () {
                    var e = Zt.pop() || Ce.expando + "_" + qt++;
                    return (this[e] = !0), e;
                },
            }),
                Ce.ajaxPrefilter("json jsonp", function (e, t, r) {
                    var i,
                        o,
                        s,
                        a = !1 !== e.jsonp && (Kt.test(e.url) ? "url" : "string" == typeof e.data && 0 === (e.contentType || "").indexOf("application/x-www-form-urlencoded") && Kt.test(e.data) && "data");
                    if (a || "jsonp" === e.dataTypes[0])
                        return (
                            (i = e.jsonpCallback = Te(e.jsonpCallback) ? e.jsonpCallback() : e.jsonpCallback),
                            a ? (e[a] = e[a].replace(Kt, "$1" + i)) : !1 !== e.jsonp && (e.url += (Ht.test(e.url) ? "&" : "?") + e.jsonp + "=" + i),
                            (e.converters["script json"] = function () {
                                return s || Ce.error(i + " was not called"), s[0];
                            }),
                            (e.dataTypes[0] = "json"),
                            (o = n[i]),
                            (n[i] = function () {
                                s = arguments;
                            }),
                            r.always(function () {
                                void 0 === o ? Ce(n).removeProp(i) : (n[i] = o), e[i] && ((e.jsonpCallback = t.jsonpCallback), Zt.push(i)), s && Te(o) && o(s[0]), (s = o = void 0);
                            }),
                            "script"
                        );
                }),
                (we.createHTMLDocument = (function () {
                    var e = ce.implementation.createHTMLDocument("").body;
                    return (e.innerHTML = "<form></form><form></form>"), 2 === e.childNodes.length;
                })()),
                (Ce.parseHTML = function (e, t, n) {
                    if ("string" != typeof e) return [];
                    "boolean" == typeof t && ((n = t), (t = !1));
                    var r, i, o;
                    return (
                        t || (we.createHTMLDocument ? ((t = ce.implementation.createHTMLDocument("")), (r = t.createElement("base")), (r.href = ce.location.href), t.head.appendChild(r)) : (t = ce)),
                        (i = Le.exec(e)),
                        (o = !n && []),
                        i ? [t.createElement(i[1])] : ((i = S([e], t, o)), o && o.length && Ce(o).remove(), Ce.merge([], i.childNodes))
                    );
                }),
                (Ce.fn.load = function (e, t, n) {
                    var r,
                        i,
                        o,
                        s = this,
                        a = e.indexOf(" ");
                    return (
                        a > -1 && ((r = ee(e.slice(a))), (e = e.slice(0, a))),
                        Te(t) ? ((n = t), (t = void 0)) : t && "object" == typeof t && (i = "POST"),
                        s.length > 0 &&
                            Ce.ajax({ url: e, type: i || "GET", dataType: "html", data: t })
                                .done(function (e) {
                                    (o = arguments), s.html(r ? Ce("<div>").append(Ce.parseHTML(e)).find(r) : e);
                                })
                                .always(
                                    n &&
                                        function (e, t) {
                                            s.each(function () {
                                                n.apply(this, o || [e.responseText, t, e]);
                                            });
                                        }
                                ),
                        this
                    );
                }),
                Ce.each(["ajaxStart", "ajaxStop", "ajaxComplete", "ajaxError", "ajaxSuccess", "ajaxSend"], function (e, t) {
                    Ce.fn[t] = function (e) {
                        return this.on(t, e);
                    };
                }),
                (Ce.expr.pseudos.animated = function (e) {
                    return Ce.grep(Ce.timers, function (t) {
                        return e === t.elem;
                    }).length;
                }),
                (Ce.offset = {
                    setOffset: function (e, t, n) {
                        var r,
                            i,
                            o,
                            s,
                            a,
                            u,
                            l,
                            c = Ce.css(e, "position"),
                            f = Ce(e),
                            p = {};
                        "static" === c && (e.style.position = "relative"),
                            (a = f.offset()),
                            (o = Ce.css(e, "top")),
                            (u = Ce.css(e, "left")),
                            (l = ("absolute" === c || "fixed" === c) && (o + u).indexOf("auto") > -1),
                            l ? ((r = f.position()), (s = r.top), (i = r.left)) : ((s = parseFloat(o) || 0), (i = parseFloat(u) || 0)),
                            Te(t) && (t = t.call(e, n, Ce.extend({}, a))),
                            null != t.top && (p.top = t.top - a.top + s),
                            null != t.left && (p.left = t.left - a.left + i),
                            "using" in t ? t.using.call(e, p) : f.css(p);
                    },
                }),
                Ce.fn.extend({
                    offset: function (e) {
                        if (arguments.length)
                            return void 0 === e
                                ? this
                                : this.each(function (t) {
                                      Ce.offset.setOffset(this, e, t);
                                  });
                        var t,
                            n,
                            r = this[0];
                        if (r) return r.getClientRects().length ? ((t = r.getBoundingClientRect()), (n = r.ownerDocument.defaultView), { top: t.top + n.pageYOffset, left: t.left + n.pageXOffset }) : { top: 0, left: 0 };
                    },
                    position: function () {
                        if (this[0]) {
                            var e,
                                t,
                                n,
                                r = this[0],
                                i = { top: 0, left: 0 };
                            if ("fixed" === Ce.css(r, "position")) t = r.getBoundingClientRect();
                            else {
                                for (t = this.offset(), n = r.ownerDocument, e = r.offsetParent || n.documentElement; e && (e === n.body || e === n.documentElement) && "static" === Ce.css(e, "position"); ) e = e.parentNode;
                                e && e !== r && 1 === e.nodeType && ((i = Ce(e).offset()), (i.top += Ce.css(e, "borderTopWidth", !0)), (i.left += Ce.css(e, "borderLeftWidth", !0)));
                            }
                            return { top: t.top - i.top - Ce.css(r, "marginTop", !0), left: t.left - i.left - Ce.css(r, "marginLeft", !0) };
                        }
                    },
                    offsetParent: function () {
                        return this.map(function () {
                            for (var e = this.offsetParent; e && "static" === Ce.css(e, "position"); ) e = e.offsetParent;
                            return e || it;
                        });
                    },
                }),
                Ce.each({ scrollLeft: "pageXOffset", scrollTop: "pageYOffset" }, function (e, t) {
                    var n = "pageYOffset" === t;
                    Ce.fn[e] = function (r) {
                        return Me(
                            this,
                            function (e, r, i) {
                                var o;
                                if ((ke(e) ? (o = e) : 9 === e.nodeType && (o = e.defaultView), void 0 === i)) return o ? o[t] : e[r];
                                o ? o.scrollTo(n ? o.pageXOffset : i, n ? i : o.pageYOffset) : (e[r] = i);
                            },
                            e,
                            r,
                            arguments.length
                        );
                    };
                }),
                Ce.each(["top", "left"], function (e, t) {
                    Ce.cssHooks[t] = R(we.pixelPosition, function (e, n) {
                        if (n) return (n = M(e, t)), pt.test(n) ? Ce(e).position()[t] + "px" : n;
                    });
                }),
                Ce.each({ Height: "height", Width: "width" }, function (e, t) {
                    Ce.each({ padding: "inner" + e, content: t, "": "outer" + e }, function (n, r) {
                        Ce.fn[r] = function (i, o) {
                            var s = arguments.length && (n || "boolean" != typeof i),
                                a = n || (!0 === i || !0 === o ? "margin" : "border");
                            return Me(
                                this,
                                function (t, n, i) {
                                    var o;
                                    return ke(t)
                                        ? 0 === r.indexOf("outer")
                                            ? t["inner" + e]
                                            : t.document.documentElement["client" + e]
                                        : 9 === t.nodeType
                                        ? ((o = t.documentElement), Math.max(t.body["scroll" + e], o["scroll" + e], t.body["offset" + e], o["offset" + e], o["client" + e]))
                                        : void 0 === i
                                        ? Ce.css(t, n, a)
                                        : Ce.style(t, n, i, a);
                                },
                                t,
                                s ? i : void 0,
                                s
                            );
                        };
                    });
                }),
                Ce.each("blur focus focusin focusout resize scroll click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup contextmenu".split(" "), function (e, t) {
                    Ce.fn[t] = function (e, n) {
                        return arguments.length > 0 ? this.on(t, null, e, n) : this.trigger(t);
                    };
                }),
                Ce.fn.extend({
                    hover: function (e, t) {
                        return this.mouseenter(e).mouseleave(t || e);
                    },
                }),
                Ce.fn.extend({
                    bind: function (e, t, n) {
                        return this.on(e, null, t, n);
                    },
                    unbind: function (e, t) {
                        return this.off(e, null, t);
                    },
                    delegate: function (e, t, n, r) {
                        return this.on(t, e, n, r);
                    },
                    undelegate: function (e, t, n) {
                        return 1 === arguments.length ? this.off(e, "**") : this.off(t, e || "**", n);
                    },
                }),
                (Ce.proxy = function (e, t) {
                    var n, r, i;
                    if (("string" == typeof t && ((n = e[t]), (t = e), (e = n)), Te(e)))
                        return (
                            (r = pe.call(arguments, 2)),
                            (i = function () {
                                return e.apply(t || this, r.concat(pe.call(arguments)));
                            }),
                            (i.guid = e.guid = e.guid || Ce.guid++),
                            i
                        );
                }),
                (Ce.holdReady = function (e) {
                    e ? Ce.readyWait++ : Ce.ready(!0);
                }),
                (Ce.isArray = Array.isArray),
                (Ce.parseJSON = JSON.parse),
                (Ce.nodeName = l),
                (Ce.isFunction = Te),
                (Ce.isWindow = ke),
                (Ce.camelCase = y),
                (Ce.type = a),
                (Ce.now = Date.now),
                (Ce.isNumeric = function (e) {
                    var t = Ce.type(e);
                    return ("number" === t || "string" === t) && !isNaN(e - parseFloat(e));
                }),
                (r = []),
                void 0 !==
                    (i = function () {
                        return Ce;
                    }.apply(t, r)) && (e.exports = i);
            var en = n.jQuery,
                tn = n.$;
            return (
                (Ce.noConflict = function (e) {
                    return n.$ === Ce && (n.$ = tn), e && n.jQuery === Ce && (n.jQuery = en), Ce;
                }),
                o || (n.jQuery = n.$ = Ce),
                Ce
            );
        });
    },
    function (e, t, n) {
        var r, i, o;
        !(function (s, a) {
            (i = [n(10), n(6), n(0)]), (r = a), void 0 !== (o = "function" == typeof r ? r.apply(t, i) : r) && (e.exports = o);
        })(0, function (e, t, n) {
            var r = 0,
                i = /{{(\S+)}}/g,
                o = function (e, t) {
                    return e.replace(i, function (e, n) {
                        var r = 0 === n.indexOf("this."),
                            i = r ? t : window,
                            o = (r ? n.slice(5) : n).split(".");
                        for (var s in o) if (void 0 === (i = i[o[s]])) throw new Error("Undefined variable in event string");
                        return i;
                    });
                },
                s = { document: window.document, window: window },
                a = e({
                    delegatedEvents: !0,
                    parseEventVariables: !0,
                    assignOptions: !1,
                    constructor: function (e) {
                        if (((this.cid = "view" + ++r), e && e.$el && ((this.$el = e.$el instanceof n ? e.$el : n(e.$el).eq(0)), delete e.$el), this.assignOptions)) {
                            var t = "function" == typeof this.defaults ? this.defaults() : this.defaults;
                            this.options = "deep" === this.assignOptions ? n.extend(!0, {}, t, e) : n.extend({}, t, e);
                        }
                        this.beforeInitialize && this.beforeInitialize.apply(this, arguments), this.initialize && this.initialize.apply(this, arguments), this.events && this.$el && this.setupEvents();
                    },
                    setupEvents: function (e) {
                        var t = e || this.events,
                            r = "function" == typeof t ? t.call(this) : t,
                            i = this;
                        if (r) {
                            var a = (this.ens = this.ens || "." + this.cid);
                            n.each(r, function (e, t) {
                                i.parseEventVariables && (e = o(e, i));
                                var r = 0 === e.indexOf("one:"),
                                    u = (r ? e.slice(4) : e).split(" "),
                                    l = u[0] + a,
                                    c = u.slice(1).join(" "),
                                    f = i.$el;
                                s[c] ? ((f = i["$" + c] = i["$" + c] || n(s[c])), (c = void 0)) : i.delegatedEvents || ((i.elementsWithBoundEvents = i.elementsWithBoundEvents || []).push((f = f.find(c))), (c = void 0)),
                                    f[r ? "one" : "on"](l, c, function () {
                                        ("function" == typeof t ? t : i[t]).apply(i, arguments);
                                    });
                            });
                        }
                        return this;
                    },
                    removeEvents: function () {
                        var e = this.ens;
                        return (
                            e &&
                                (this.$el && this.$el.off(e),
                                this.$document && this.$document.off(e),
                                this.$window && this.$window.off(e),
                                this.elementsWithBoundEvents &&
                                    (n.each(this.elementsWithBoundEvents, function (t, r) {
                                        n(r).off(e);
                                    }),
                                    delete this.elementsWithBoundEvents),
                                delete this.dismissListeners),
                            this
                        );
                    },
                    addDismissListener: function (e, t) {
                        var r = this;
                        if (!e) throw new Error("Dismiss listener name not speficied");
                        return (
                            (t = n.extend({ $el: this.$el }, t)),
                            (this.$document = this.$document || n(document)),
                            (this.ens = this.ens || "." + this.cid),
                            (this.dismissListeners = this.dismissListeners || {}),
                            this.dismissListeners[e] ||
                                ((this.dismissListeners[e] = function (i) {
                                    (27 !== i.keyCode && (n(i.target).is(t.$el) || n.contains(t.$el.get(0), i.target))) || r[e].call(r);
                                }),
                                this.$document.on("click" + this.ens + " keyup" + this.ens, this.dismissListeners[e])),
                            this
                        );
                    },
                    removeDismissListener: function (e) {
                        if (!e) throw new Error("Name of dismiss listener to remove not specified");
                        return this.dismissListeners && this.dismissListeners[e] && (this.$document.off("click keyup", this.dismissListeners[e]), delete this.dismissListeners[e]), this;
                    },
                    remove: function () {
                        return this.trigger("beforeRemove"), this.removeEvents().abortDeferreds().removeViews(), this.$el && this.$el.remove(), this.trigger("afterRemove"), this.off().stopListening(), this;
                    },
                    addDeferred: function (e) {
                        return (this.deferreds = this.deferreds || []), (!Array.prototype.indexOf || this.deferreds.indexOf(e) < 0) && this.deferreds.push(e), e;
                    },
                    abortDeferreds: function () {
                        return (
                            this.deferreds &&
                                n.each(this.deferreds, function (e, t) {
                                    "object" == typeof t && t.state && "pending" === t.state() && (t.abort ? t.abort() : t.reject());
                                }),
                            delete this.deferreds,
                            this
                        );
                    },
                    when: function (e, t, r) {
                        var i = this;
                        return (
                            n.each((e = n.isArray(e) ? e : [e]), function (e, t) {
                                i.addDeferred(t);
                            }),
                            n.when.apply(n, e).done(n.proxy(t, this)).fail(n.proxy(r, this))
                        );
                    },
                    addView: function (e) {
                        return (
                            (this.views = this.views || {}),
                            (this.views[e.cid] = e),
                            this.listenTo(e, "afterRemove", function () {
                                delete this.views[e.cid];
                            }),
                            e
                        );
                    },
                    mapView: function (e, t, r) {
                        var i = ("string" == typeof e ? this.$(e) : n(e)).eq(0);
                        return i.length ? this.addView(new t(n.extend({ $el: i }, r))) : void 0;
                    },
                    mapViews: function (e, t, r) {
                        var i = this;
                        return ("string" == typeof e ? this.$(e) : n(e))
                            .map(function (e, o) {
                                return i.addView(new t(n.extend({ $el: n(o) }, r)));
                            })
                            .get();
                    },
                    mapViewsAsync: function (e, t, r) {
                        var i = this,
                            o = n.Deferred(),
                            s = "string" == typeof e ? this.$(e) : n(e);
                        return (
                            s.length
                                ? t(function (e) {
                                      o.resolve(i.mapViews(s, e, r));
                                  })
                                : o.resolve([]),
                            o
                        );
                    },
                    removeViews: function () {
                        return (
                            this.views &&
                                n.each(this.views, function (e, t) {
                                    t.remove();
                                }),
                            delete this.views,
                            this
                        );
                    },
                    $: function (e) {
                        return this.$el.find(e);
                    },
                });
            return t(a.prototype), a;
        });
    },
    function (e, t, n) {
        var r = (window.$ = window.jQuery = n(0)),
            i = n(1),
            o = n(4);
        n(5),
            (e.exports = i.extend({
                setupCodeHighlight: function () {
                    var e = n(8);
                    n(7),
                        e.plugins.NormalizeWhitespace.setDefaults({ "remove-trailing": !0, "remove-indent": !0, "left-trim": !0, "right-trim": !0 }),
                        e.highlightAll(),
                        r(".attireCodeToggleBlock").on("click", ".attireCodeToggleBtn", function (e) {
                            r(e.delegateTarget).toggleClass("isActive"), o.checkAll();
                        });
                },
                setupAttireQueue: function () {
                    window.attireQueue &&
                        window.attireQueue.length &&
                        r.each(window.attireQueue, function (e, t) {
                            t(r);
                        }),
                        (window.attireQueue = {
                            push: function (e) {
                                e(r);
                            },
                        });
                },
            }));
    },
    function (e, t, n) {
        var r = n(0),
            i = n(1),
            o = n(9);
        e.exports = i.extend({
            initialize: function () {
                (this.options = r.extend({}, this.$el.data())),
                    this.$el.html('<p class="loader">Loading...</p>'),
                    this.$el.whenInViewport(
                        function () {
                            this.loadRepos(function (e) {
                                this.render(this.options.user, o(e).slice(0, 3));
                            });
                        },
                        { threshold: 1e3, context: this }
                    );
            },
            loadRepos: function (e) {
                var t = this.options,
                    n = this;
                r.get("https://api.github.com/users/" + t.user + "/repos", function (i) {
                    var o = r('link[rel="canonical"]').attr("href"),
                        s = o
                            ? r
                                  .map(o.split("/"), function (e) {
                                      return e || void 0;
                                  })
                                  .slice(-1)[0]
                            : void 0,
                        a = r.map(i, function (e) {
                            return (t.onlyWithPages && !e.has_pages) || (t.excludeRepo && !(t.excludeRepo.split(",").indexOf(e.name) < 0)) || (s && s === e.name)
                                ? void 0
                                : { title: e.name, description: e.description, url: e.homepage || e.html_url };
                        });
                    e && e.call(n, a);
                });
            },
            render: function (e, t) {
                var n = r("<ul />");
                r.each(t, function (e, t) {
                    n.append('<li><a class="attireUserRepo" href="' + t.url + '"><h3 class="title">' + t.title + '</h3><p class="description">' + t.description + "</p></a></li>");
                }),
                    this.$el
                        .empty()
                        .append('<h2 class="title">More from ' + e + "</h2>")
                        .append(n);
            },
        });
    },
    function (e, t, n) {
        var r, i, o;
        !(function (n, s) {
            (i = []), (r = s), void 0 !== (o = "function" == typeof r ? r.apply(t, i) : r) && (e.exports = o);
        })(0, function () {
            function e(e, t, n) {
                l.setup(), (this.registryItem = u.addItem(e, "function" == typeof t ? o(n || {}, { callback: t }) : t)), u.processItem(this.registryItem);
            }
            function t() {
                return "innerHeight" in window ? window.innerHeight : document.documentElement.offsetHeight;
            }
            function n() {
                return "pageYOffset" in window ? window.pageYOffset : document.documentElement.scrollTop || document.body.scrollTop;
            }
            function r(e) {
                return e.getBoundingClientRect().top + n();
            }
            function i(e, t, n) {
                for (var r in e) if (e.hasOwnProperty(r) && !1 === t.call(n, e[r], r)) break;
            }
            function o(e) {
                for (var t = 1; t < arguments.length; t++)
                    i(arguments[t], function (t, n) {
                        e[n] = t;
                    });
                return e;
            }
            var s, a;
            (e.prototype.stopListening = function () {
                u.removeItem(this.registryItem), l.removeIfStoreEmpty();
            }),
                (e.defaults = { threshold: 0, context: null }),
                o(e, {
                    setRateLimiter: function (e, t) {
                        return (l.rateLimiter = e), t && (l.rateLimitDelay = t), this;
                    },
                    checkAll: function () {
                        return (a = n()), (s = t()), u.adjustPositions(u.processItem), l.removeIfStoreEmpty(), this;
                    },
                    destroy: function () {
                        return (u.store = {}), l.remove(), delete l.scrollHandler, delete l.resizeHandler, this;
                    },
                    registerAsJqueryPlugin: function (t) {
                        return (
                            (t.fn.whenInViewport = function (n, r) {
                                var i,
                                    o = function (e) {
                                        return function (n) {
                                            e.call(this, t(n));
                                        };
                                    };
                                return (
                                    (i = "function" == typeof n ? t.extend({}, r, { callback: o(n) }) : t.extend(n, { callback: o(n.callback) })),
                                    this.each(function () {
                                        i.setupOnce ? !t.data(this, "whenInViewport") && t.data(this, "whenInViewport", new e(this, i)) : t.data(this, "whenInViewport", new e(this, i));
                                    })
                                );
                            }),
                            this
                        );
                    },
                });
            var u = {
                    store: {},
                    counter: 0,
                    addItem: function (t, n) {
                        var i = "whenInViewport" + ++this.counter,
                            s = o({}, e.defaults, n, { storeKey: i, element: t, topOffset: r(t) });
                        return (this.store[i] = s);
                    },
                    adjustPositions: function (e) {
                        i(this.store, function (t) {
                            (t.topOffset = r(t.element)), e && e.call(u, t);
                        });
                    },
                    processAll: function () {
                        i(this.store, this.processItem, this);
                    },
                    processItem: function (e) {
                        a + s >= e.topOffset - e.threshold && (this.removeItem(e), e.callback.call(e.context || window, e.element));
                    },
                    removeItem: function (e) {
                        delete this.store[e.storeKey];
                    },
                    isEmpty: function () {
                        var e = !0;
                        return (
                            i(this.store, function () {
                                return (e = !1);
                            }),
                            e
                        );
                    },
                },
                l = {
                    setuped: !1,
                    rateLimiter: function (e, t) {
                        return e;
                    },
                    rateLimitDelay: 100,
                    on: function (e, t) {
                        return window.addEventListener ? window.addEventListener(e, t, !1) : window.attachEvent && window.attachEvent(e, t), this;
                    },
                    off: function (e, t) {
                        return window.removeEventListener ? window.removeEventListener(e, t, !1) : window.detachEvent && window.detachEvent("on" + e, t), this;
                    },
                    setup: function () {
                        var e = this;
                        this.setuped ||
                            ((a = n()),
                            (s = t()),
                            (this.scrollHandler =
                                this.scrollHandler ||
                                this.rateLimiter(function () {
                                    (a = n()), u.processAll(), e.removeIfStoreEmpty();
                                }, this.rateLimitDelay)),
                            (this.resizeHandler =
                                this.resizeHandler ||
                                this.rateLimiter(function () {
                                    (s = t()), u.adjustPositions(u.processItem), e.removeIfStoreEmpty();
                                }, this.rateLimitDelay)),
                            this.on("scroll", this.scrollHandler).on("resize", this.resizeHandler),
                            (this.setuped = !0));
                    },
                    removeIfStoreEmpty: function () {
                        u.isEmpty() && this.remove();
                    },
                    remove: function () {
                        this.setuped && (this.off("scroll", this.scrollHandler).off("resize", this.resizeHandler), (this.setuped = !1));
                    },
                },
                c = window.jQuery || window.$;
            return c && e.registerAsJqueryPlugin(c), e;
        });
    },
    function (e, t) {
        !(function (e) {
            "use strict";
            e.console || (e.console = {});
            for (
                var t,
                    n,
                    r = e.console,
                    i = function () {},
                    o = ["memory"],
                    s = "assert,clear,count,debug,dir,dirxml,error,exception,group,groupCollapsed,groupEnd,info,log,markTimeline,profile,profiles,profileEnd,show,table,time,timeEnd,timeline,timelineEnd,timeStamp,trace,warn".split(",");
                (t = o.pop());

            )
                r[t] || (r[t] = {});
            for (; (n = s.pop()); ) r[n] || (r[n] = i);
        })("undefined" == typeof window ? this : window);
    },
    function (e, t, n) {
        var r, i, o;
        !(function (n, s) {
            (i = []), (r = s), void 0 !== (o = "function" == typeof r ? r.apply(t, i) : r) && (e.exports = o);
        })(0, function () {
            function e(e, t) {
                if (e instanceof Array) for (var n = 0; n < e.length; n++) t(e[n], n);
                else for (var r in e) e.hasOwnProperty(r) && t(r, e[r]);
            }
            function t(e, t) {
                if (Array.prototype.indexOf) return e.indexOf(t);
                for (var n = 0; n < e.length; n++) if (e[n] === t) return n;
                return -1;
            }
            function n(e, t, n, r) {
                (e._mittyOn = e._mittyOn || []), e._mittyOn.push({ listener: t, eventName: n, callback: r });
            }
            function r(t, n, r, i) {
                if (t._mittyOn && t._mittyOn.length) {
                    var o = {},
                        s = [];
                    n && (o.listener = n),
                        i && (o.callback = i),
                        r && (o.eventName = r),
                        e(t._mittyOn, function (t) {
                            var n = !0;
                            e(o, function (e, r) {
                                t[e] !== r && (n = !1);
                            }),
                                !n && s.push(t);
                        }),
                        (t._mittyOn = s);
                }
            }
            function i(e, t) {
                if (e._mittyOn) for (var n = 0; n < e._mittyOn.length; n++) if (e._mittyOn[n].listener === t) return !0;
                return !1;
            }
            function o(n, o, s, a) {
                var u = n._mittyListenTo && n._mittyListenTo.length > 0;
                o && u
                    ? (r(o, n, s, a), i(o, n) || n._mittyListenTo.splice(t(n._mittyListenTo, o), 1))
                    : u &&
                      (e(n._mittyListenTo, function (e) {
                          r(e, n);
                      }),
                      (n._mittyListenTo = []));
            }
            var s = {
                on: function (e, t) {
                    return n(this, this, e, t), this;
                },
                listenTo: function (e, r, i) {
                    return n(e, this, r, i), (this._mittyListenTo = this._mittyListenTo || []), t(this._mittyListenTo, e) < 0 && this._mittyListenTo.push(e), this;
                },
                off: function (e, t) {
                    return r(this, null, e, t), this;
                },
                stopListening: function (e, t, n) {
                    return o(this, e, t, n), this;
                },
                trigger: function (t, n) {
                    return (
                        this._mittyOn &&
                            e(this._mittyOn, function (e) {
                                e.eventName === t && e.callback.call(e.listener, n);
                            }),
                        this
                    );
                },
            };
            return function (t) {
                return (
                    e(s, function (e, n) {
                        t[e] = n;
                    }),
                    t
                );
            };
        });
    },
    function (e, t) {
        !(function () {
            function t(e) {
                this.defaults = i({}, e);
            }
            function n(e) {
                return e.replace(/-(\w)/g, function (e, t) {
                    return t.toUpperCase();
                });
            }
            function r(e) {
                for (var t = 0, n = 0; n < e.length; ++n) e.charCodeAt(n) == "\t".charCodeAt(0) && (t += 3);
                return e.length + t;
            }
            var i =
                Object.assign ||
                function (e, t) {
                    for (var n in t) t.hasOwnProperty(n) && (e[n] = t[n]);
                    return e;
                };
            (t.prototype = {
                setDefaults: function (e) {
                    this.defaults = i(this.defaults, e);
                },
                normalize: function (e, t) {
                    t = i(this.defaults, t);
                    for (var r in t) {
                        var o = n(r);
                        "normalize" !== r && "setDefaults" !== o && t[r] && this[o] && (e = this[o].call(this, e, t[r]));
                    }
                    return e;
                },
                leftTrim: function (e) {
                    return e.replace(/^\s+/, "");
                },
                rightTrim: function (e) {
                    return e.replace(/\s+$/, "");
                },
                tabsToSpaces: function (e, t) {
                    return (t = 0 | t || 4), e.replace(/\t/g, new Array(++t).join(" "));
                },
                spacesToTabs: function (e, t) {
                    return (t = 0 | t || 4), e.replace(new RegExp(" {" + t + "}", "g"), "\t");
                },
                removeTrailing: function (e) {
                    return e.replace(/\s*?$/gm, "");
                },
                removeInitialLineFeed: function (e) {
                    return e.replace(/^(?:\r?\n|\r)/, "");
                },
                removeIndent: function (e) {
                    var t = e.match(/^[^\S\n\r]*(?=\S)/gm);
                    return t && t[0].length
                        ? (t.sort(function (e, t) {
                              return e.length - t.length;
                          }),
                          t[0].length ? e.replace(new RegExp("^" + t[0], "gm"), "") : e)
                        : e;
                },
                indent: function (e, t) {
                    return e.replace(/^[^\S\n\r]*(?=\S)/gm, new Array(++t).join("\t") + "$&");
                },
                breakLines: function (e, t) {
                    t = !0 === t ? 80 : 0 | t || 80;
                    for (var n = e.split("\n"), i = 0; i < n.length; ++i)
                        if (!(r(n[i]) <= t)) {
                            for (var o = n[i].split(/(\s+)/g), s = 0, a = 0; a < o.length; ++a) {
                                var u = r(o[a]);
                                (s += u), s > t && ((o[a] = "\n" + o[a]), (s = u));
                            }
                            n[i] = o.join("");
                        }
                    return n.join("\n");
                },
            }),
                void 0 !== e && e.exports && (e.exports = t),
                "undefined" != typeof Prism &&
                    ((Prism.plugins.NormalizeWhitespace = new t({ "remove-trailing": !0, "remove-indent": !0, "left-trim": !0, "right-trim": !0 })),
                    Prism.hooks.add("before-sanity-check", function (e) {
                        var t = Prism.plugins.NormalizeWhitespace;
                        if (!e.settings || !1 !== e.settings["whitespace-normalization"]) {
                            if ((!e.element || !e.element.parentNode) && e.code) return void (e.code = t.normalize(e.code, e.settings));
                            var n = e.element.parentNode,
                                r = /\bno-whitespace-normalization\b/;
                            if (e.code && n && "pre" === n.nodeName.toLowerCase() && !r.test(n.className) && !r.test(e.element.className)) {
                                for (var i = n.childNodes, o = "", s = "", a = !1, u = 0; u < i.length; ++u) {
                                    var l = i[u];
                                    l == e.element ? (a = !0) : "#text" === l.nodeName && (a ? (s += l.nodeValue) : (o += l.nodeValue), n.removeChild(l), --u);
                                }
                                if (e.element.children.length && Prism.plugins.KeepMarkup) {
                                    var c = o + e.element.innerHTML + s;
                                    (e.element.innerHTML = t.normalize(c, e.settings)), (e.code = e.element.textContent);
                                } else (e.code = o + e.code + s), (e.code = t.normalize(e.code, e.settings));
                            }
                        }
                    }));
        })();
    },
    function (e, t, n) {
        (function (t) {
            var n = "undefined" != typeof window ? window : "undefined" != typeof WorkerGlobalScope && self instanceof WorkerGlobalScope ? self : {},
                r = (function () {
                    var e = /\blang(?:uage)?-([\w-]+)\b/i,
                        t = 0,
                        r = (n.Prism = {
                            manual: n.Prism && n.Prism.manual,
                            disableWorkerMessageHandler: n.Prism && n.Prism.disableWorkerMessageHandler,
                            util: {
                                encode: function (e) {
                                    return e instanceof i
                                        ? new i(e.type, r.util.encode(e.content), e.alias)
                                        : "Array" === r.util.type(e)
                                        ? e.map(r.util.encode)
                                        : e
                                              .replace(/&/g, "&amp;")
                                              .replace(/</g, "&lt;")
                                              .replace(/\u00a0/g, " ");
                                },
                                type: function (e) {
                                    return Object.prototype.toString.call(e).match(/\[object (\w+)\]/)[1];
                                },
                                objId: function (e) {
                                    return e.__id || Object.defineProperty(e, "__id", { value: ++t }), e.__id;
                                },
                                clone: function (e, t) {
                                    var n = r.util.type(e);
                                    switch (((t = t || {}), n)) {
                                        case "Object":
                                            if (t[r.util.objId(e)]) return t[r.util.objId(e)];
                                            var i = {};
                                            t[r.util.objId(e)] = i;
                                            for (var o in e) e.hasOwnProperty(o) && (i[o] = r.util.clone(e[o], t));
                                            return i;
                                        case "Array":
                                            if (t[r.util.objId(e)]) return t[r.util.objId(e)];
                                            var i = [];
                                            return (
                                                (t[r.util.objId(e)] = i),
                                                e.forEach(function (e, n) {
                                                    i[n] = r.util.clone(e, t);
                                                }),
                                                i
                                            );
                                    }
                                    return e;
                                },
                            },
                            languages: {
                                extend: function (e, t) {
                                    var n = r.util.clone(r.languages[e]);
                                    for (var i in t) n[i] = t[i];
                                    return n;
                                },
                                insertBefore: function (e, t, n, i) {
                                    i = i || r.languages;
                                    var o = i[e];
                                    if (2 == arguments.length) {
                                        n = arguments[1];
                                        for (var s in n) n.hasOwnProperty(s) && (o[s] = n[s]);
                                        return o;
                                    }
                                    var a = {};
                                    for (var u in o)
                                        if (o.hasOwnProperty(u)) {
                                            if (u == t) for (var s in n) n.hasOwnProperty(s) && (a[s] = n[s]);
                                            a[u] = o[u];
                                        }
                                    return (
                                        r.languages.DFS(r.languages, function (t, n) {
                                            n === i[e] && t != e && (this[t] = a);
                                        }),
                                        (i[e] = a)
                                    );
                                },
                                DFS: function (e, t, n, i) {
                                    i = i || {};
                                    for (var o in e)
                                        e.hasOwnProperty(o) &&
                                            (t.call(e, o, e[o], n || o),
                                            "Object" !== r.util.type(e[o]) || i[r.util.objId(e[o])]
                                                ? "Array" !== r.util.type(e[o]) || i[r.util.objId(e[o])] || ((i[r.util.objId(e[o])] = !0), r.languages.DFS(e[o], t, o, i))
                                                : ((i[r.util.objId(e[o])] = !0), r.languages.DFS(e[o], t, null, i)));
                                },
                            },
                            plugins: {},
                            highlightAll: function (e, t) {
                                r.highlightAllUnder(document, e, t);
                            },
                            highlightAllUnder: function (e, t, n) {
                                var i = { callback: n, selector: 'code[class*="language-"], [class*="language-"] code, code[class*="lang-"], [class*="lang-"] code' };
                                r.hooks.run("before-highlightall", i);
                                for (var o, s = i.elements || e.querySelectorAll(i.selector), a = 0; (o = s[a++]); ) r.highlightElement(o, !0 === t, i.callback);
                            },
                            highlightElement: function (t, i, o) {
                                for (var s, a, u = t; u && !e.test(u.className); ) u = u.parentNode;
                                u && ((s = (u.className.match(e) || [, ""])[1].toLowerCase()), (a = r.languages[s])),
                                    (t.className = t.className.replace(e, "").replace(/\s+/g, " ") + " language-" + s),
                                    t.parentNode && ((u = t.parentNode), /pre/i.test(u.nodeName) && (u.className = u.className.replace(e, "").replace(/\s+/g, " ") + " language-" + s));
                                var l = t.textContent,
                                    c = { element: t, language: s, grammar: a, code: l };
                                if ((r.hooks.run("before-sanity-check", c), !c.code || !c.grammar))
                                    return c.code && (r.hooks.run("before-highlight", c), (c.element.textContent = c.code), r.hooks.run("after-highlight", c)), void r.hooks.run("complete", c);
                                if ((r.hooks.run("before-highlight", c), i && n.Worker)) {
                                    var f = new Worker(r.filename);
                                    (f.onmessage = function (e) {
                                        (c.highlightedCode = e.data), r.hooks.run("before-insert", c), (c.element.innerHTML = c.highlightedCode), o && o.call(c.element), r.hooks.run("after-highlight", c), r.hooks.run("complete", c);
                                    }),
                                        f.postMessage(JSON.stringify({ language: c.language, code: c.code, immediateClose: !0 }));
                                } else
                                    (c.highlightedCode = r.highlight(c.code, c.grammar, c.language)),
                                        r.hooks.run("before-insert", c),
                                        (c.element.innerHTML = c.highlightedCode),
                                        o && o.call(t),
                                        r.hooks.run("after-highlight", c),
                                        r.hooks.run("complete", c);
                            },
                            highlight: function (e, t, n) {
                                var o = { code: e, grammar: t, language: n };
                                return r.hooks.run("before-tokenize", o), (o.tokens = r.tokenize(o.code, o.grammar)), r.hooks.run("after-tokenize", o), i.stringify(r.util.encode(o.tokens), o.language);
                            },
                            matchGrammar: function (e, t, n, i, o, s, a) {
                                var u = r.Token;
                                for (var l in n)
                                    if (n.hasOwnProperty(l) && n[l]) {
                                        if (l == a) return;
                                        var c = n[l];
                                        c = "Array" === r.util.type(c) ? c : [c];
                                        for (var f = 0; f < c.length; ++f) {
                                            var p = c[f],
                                                d = p.inside,
                                                h = !!p.lookbehind,
                                                g = !!p.greedy,
                                                m = 0,
                                                v = p.alias;
                                            if (g && !p.pattern.global) {
                                                var y = p.pattern.toString().match(/[imuy]*$/)[0];
                                                p.pattern = RegExp(p.pattern.source, y + "g");
                                            }
                                            p = p.pattern || p;
                                            for (var x = i, b = o; x < t.length; b += t[x].length, ++x) {
                                                var w = t[x];
                                                if (t.length > e.length) return;
                                                if (!(w instanceof u)) {
                                                    if (g && x != t.length - 1) {
                                                        p.lastIndex = b;
                                                        var T = p.exec(e);
                                                        if (!T) break;
                                                        for (var k = T.index + (h ? T[1].length : 0), E = T.index + T[0].length, C = x, A = b, S = t.length; C < S && (A < E || (!t[C].type && !t[C - 1].greedy)); ++C)
                                                            (A += t[C].length), k >= A && (++x, (b = A));
                                                        if (t[x] instanceof u) continue;
                                                        (j = C - x), (w = e.slice(b, A)), (T.index -= b);
                                                    } else {
                                                        p.lastIndex = 0;
                                                        var T = p.exec(w),
                                                            j = 1;
                                                    }
                                                    if (T) {
                                                        h && (m = T[1] ? T[1].length : 0);
                                                        var k = T.index + m,
                                                            T = T[0].slice(m),
                                                            E = k + T.length,
                                                            N = w.slice(0, k),
                                                            D = w.slice(E),
                                                            L = [x, j];
                                                        N && (++x, (b += N.length), L.push(N));
                                                        var O = new u(l, d ? r.tokenize(T, d) : T, v, T, g);
                                                        if ((L.push(O), D && L.push(D), Array.prototype.splice.apply(t, L), 1 != j && r.matchGrammar(e, t, n, x, b, !0, l), s)) break;
                                                    } else if (s) break;
                                                }
                                            }
                                        }
                                    }
                            },
                            tokenize: function (e, t, n) {
                                var i = [e],
                                    o = t.rest;
                                if (o) {
                                    for (var s in o) t[s] = o[s];
                                    delete t.rest;
                                }
                                return r.matchGrammar(e, i, t, 0, 0, !1), i;
                            },
                            hooks: {
                                all: {},
                                add: function (e, t) {
                                    var n = r.hooks.all;
                                    (n[e] = n[e] || []), n[e].push(t);
                                },
                                run: function (e, t) {
                                    var n = r.hooks.all[e];
                                    if (n && n.length) for (var i, o = 0; (i = n[o++]); ) i(t);
                                },
                            },
                        }),
                        i = (r.Token = function (e, t, n, r, i) {
                            (this.type = e), (this.content = t), (this.alias = n), (this.length = 0 | (r || "").length), (this.greedy = !!i);
                        });
                    if (
                        ((i.stringify = function (e, t, n) {
                            if ("string" == typeof e) return e;
                            if ("Array" === r.util.type(e))
                                return e
                                    .map(function (n) {
                                        return i.stringify(n, t, e);
                                    })
                                    .join("");
                            var o = { type: e.type, content: i.stringify(e.content, t, n), tag: "span", classes: ["token", e.type], attributes: {}, language: t, parent: n };
                            if (e.alias) {
                                var s = "Array" === r.util.type(e.alias) ? e.alias : [e.alias];
                                Array.prototype.push.apply(o.classes, s);
                            }
                            r.hooks.run("wrap", o);
                            var a = Object.keys(o.attributes)
                                .map(function (e) {
                                    return e + '="' + (o.attributes[e] || "").replace(/"/g, "&quot;") + '"';
                                })
                                .join(" ");
                            return "<" + o.tag + ' class="' + o.classes.join(" ") + '"' + (a ? " " + a : "") + ">" + o.content + "</" + o.tag + ">";
                        }),
                        !n.document)
                    )
                        return n.addEventListener
                            ? (r.disableWorkerMessageHandler ||
                                  n.addEventListener(
                                      "message",
                                      function (e) {
                                          var t = JSON.parse(e.data),
                                              i = t.language,
                                              o = t.code,
                                              s = t.immediateClose;
                                          n.postMessage(r.highlight(o, r.languages[i], i)), s && n.close();
                                      },
                                      !1
                                  ),
                              n.Prism)
                            : n.Prism;
                    var o = document.currentScript || [].slice.call(document.getElementsByTagName("script")).pop();
                    return (
                        o &&
                            ((r.filename = o.src),
                            r.manual ||
                                o.hasAttribute("data-manual") ||
                                ("loading" !== document.readyState
                                    ? window.requestAnimationFrame
                                        ? window.requestAnimationFrame(r.highlightAll)
                                        : window.setTimeout(r.highlightAll, 16)
                                    : document.addEventListener("DOMContentLoaded", r.highlightAll))),
                        n.Prism
                    );
                })();
            void 0 !== e && e.exports && (e.exports = r),
                void 0 !== t && (t.Prism = r),
                (r.languages.markup = {
                    comment: /<!--[\s\S]*?-->/,
                    prolog: /<\?[\s\S]+?\?>/,
                    doctype: /<!DOCTYPE[\s\S]+?>/i,
                    cdata: /<!\[CDATA\[[\s\S]*?]]>/i,
                    tag: {
                        pattern: /<\/?(?!\d)[^\s>\/=$<%]+(?:\s+[^\s>\/=]+(?:=(?:("|')(?:\\[\s\S]|(?!\1)[^\\])*\1|[^\s'">=]+))?)*\s*\/?>/i,
                        greedy: !0,
                        inside: {
                            tag: { pattern: /^<\/?[^\s>\/]+/i, inside: { punctuation: /^<\/?/, namespace: /^[^\s>\/:]+:/ } },
                            "attr-value": { pattern: /=(?:("|')(?:\\[\s\S]|(?!\1)[^\\])*\1|[^\s'">=]+)/i, inside: { punctuation: [/^=/, { pattern: /(^|[^\\])["']/, lookbehind: !0 }] } },
                            punctuation: /\/?>/,
                            "attr-name": { pattern: /[^\s>\/]+/, inside: { namespace: /^[^\s>\/:]+:/ } },
                        },
                    },
                    entity: /&#?[\da-z]{1,8};/i,
                }),
                (r.languages.markup.tag.inside["attr-value"].inside.entity = r.languages.markup.entity),
                r.hooks.add("wrap", function (e) {
                    "entity" === e.type && (e.attributes.title = e.content.replace(/&amp;/, "&"));
                }),
                (r.languages.xml = r.languages.markup),
                (r.languages.html = r.languages.markup),
                (r.languages.mathml = r.languages.markup),
                (r.languages.svg = r.languages.markup),
                (r.languages.css = {
                    comment: /\/\*[\s\S]*?\*\//,
                    atrule: { pattern: /@[\w-]+?.*?(?:;|(?=\s*\{))/i, inside: { rule: /@[\w-]+/ } },
                    url: /url\((?:(["'])(?:\\(?:\r\n|[\s\S])|(?!\1)[^\\\r\n])*\1|.*?)\)/i,
                    selector: /[^{}\s][^{};]*?(?=\s*\{)/,
                    string: { pattern: /("|')(?:\\(?:\r\n|[\s\S])|(?!\1)[^\\\r\n])*\1/, greedy: !0 },
                    property: /[-_a-z\xA0-\uFFFF][-\w\xA0-\uFFFF]*(?=\s*:)/i,
                    important: /\B!important\b/i,
                    function: /[-a-z0-9]+(?=\()/i,
                    punctuation: /[(){};:]/,
                }),
                (r.languages.css.atrule.inside.rest = r.languages.css),
                r.languages.markup &&
                    (r.languages.insertBefore("markup", "tag", { style: { pattern: /(<style[\s\S]*?>)[\s\S]*?(?=<\/style>)/i, lookbehind: !0, inside: r.languages.css, alias: "language-css", greedy: !0 } }),
                    r.languages.insertBefore(
                        "inside",
                        "attr-value",
                        {
                            "style-attr": {
                                pattern: /\s*style=("|')(?:\\[\s\S]|(?!\1)[^\\])*\1/i,
                                inside: { "attr-name": { pattern: /^\s*style/i, inside: r.languages.markup.tag.inside }, punctuation: /^\s*=\s*['"]|['"]\s*$/, "attr-value": { pattern: /.+/i, inside: r.languages.css } },
                                alias: "language-css",
                            },
                        },
                        r.languages.markup.tag
                    )),
                (r.languages.clike = {
                    comment: [
                        { pattern: /(^|[^\\])\/\*[\s\S]*?(?:\*\/|$)/, lookbehind: !0 },
                        { pattern: /(^|[^\\:])\/\/.*/, lookbehind: !0, greedy: !0 },
                    ],
                    string: { pattern: /(["'])(?:\\(?:\r\n|[\s\S])|(?!\1)[^\\\r\n])*\1/, greedy: !0 },
                    "class-name": { pattern: /((?:\b(?:class|interface|extends|implements|trait|instanceof|new)\s+)|(?:catch\s+\())[\w.\\]+/i, lookbehind: !0, inside: { punctuation: /[.\\]/ } },
                    keyword: /\b(?:if|else|while|do|for|return|in|instanceof|function|new|try|throw|catch|finally|null|break|continue)\b/,
                    boolean: /\b(?:true|false)\b/,
                    function: /[a-z0-9_]+(?=\()/i,
                    number: /\b0x[\da-f]+\b|(?:\b\d+\.?\d*|\B\.\d+)(?:e[+-]?\d+)?/i,
                    operator: /--?|\+\+?|!=?=?|<=?|>=?|==?=?|&&?|\|\|?|\?|\*|\/|~|\^|%/,
                    punctuation: /[{}[\];(),.:]/,
                }),
                (r.languages.javascript = r.languages.extend("clike", {
                    keyword: /\b(?:as|async|await|break|case|catch|class|const|continue|debugger|default|delete|do|else|enum|export|extends|finally|for|from|function|get|if|implements|import|in|instanceof|interface|let|new|null|of|package|private|protected|public|return|set|static|super|switch|this|throw|try|typeof|var|void|while|with|yield)\b/,
                    number: /\b(?:0[xX][\dA-Fa-f]+|0[bB][01]+|0[oO][0-7]+|NaN|Infinity)\b|(?:\b\d+\.?\d*|\B\.\d+)(?:[Ee][+-]?\d+)?/,
                    function: /[_$a-z\xA0-\uFFFF][$\w\xA0-\uFFFF]*(?=\s*\()/i,
                    operator: /-[-=]?|\+[+=]?|!=?=?|<<?=?|>>?>?=?|=(?:==?|>)?|&[&=]?|\|[|=]?|\*\*?=?|\/=?|~|\^=?|%=?|\?|\.{3}/,
                })),
                r.languages.insertBefore("javascript", "keyword", {
                    regex: { pattern: /((?:^|[^$\w\xA0-\uFFFF."'\])\s])\s*)\/(\[[^\]\r\n]+]|\\.|[^\/\\\[\r\n])+\/[gimyu]{0,5}(?=\s*($|[\r\n,.;})\]]))/, lookbehind: !0, greedy: !0 },
                    "function-variable": { pattern: /[_$a-z\xA0-\uFFFF][$\w\xA0-\uFFFF]*(?=\s*=\s*(?:function\b|(?:\([^()]*\)|[_$a-z\xA0-\uFFFF][$\w\xA0-\uFFFF]*)\s*=>))/i, alias: "function" },
                    constant: /\b[A-Z][A-Z\d_]*\b/,
                }),
                r.languages.insertBefore("javascript", "string", {
                    "template-string": {
                        pattern: /`(?:\\[\s\S]|\${[^}]+}|[^\\`])*`/,
                        greedy: !0,
                        inside: { interpolation: { pattern: /\${[^}]+}/, inside: { "interpolation-punctuation": { pattern: /^\${|}$/, alias: "punctuation" }, rest: null } }, string: /[\s\S]+/ },
                    },
                }),
                (r.languages.javascript["template-string"].inside.interpolation.inside.rest = r.languages.javascript),
                r.languages.markup && r.languages.insertBefore("markup", "tag", { script: { pattern: /(<script[\s\S]*?>)[\s\S]*?(?=<\/script>)/i, lookbehind: !0, inside: r.languages.javascript, alias: "language-javascript", greedy: !0 } }),
                (r.languages.js = r.languages.javascript),
                (function () {
                    "undefined" != typeof self &&
                        self.Prism &&
                        self.document &&
                        document.querySelector &&
                        ((self.Prism.fileHighlight = function () {
                            var e = { js: "javascript", py: "python", rb: "ruby", ps1: "powershell", psm1: "powershell", sh: "bash", bat: "batch", h: "c", tex: "latex" };
                            Array.prototype.slice.call(document.querySelectorAll("pre[data-src]")).forEach(function (t) {
                                for (var n, i = t.getAttribute("data-src"), o = t, s = /\blang(?:uage)?-([\w-]+)\b/i; o && !s.test(o.className); ) o = o.parentNode;
                                if ((o && (n = (t.className.match(s) || [, ""])[1]), !n)) {
                                    var a = (i.match(/\.(\w+)$/) || [, ""])[1];
                                    n = e[a] || a;
                                }
                                var u = document.createElement("code");
                                (u.className = "language-" + n), (t.textContent = ""), (u.textContent = "Loading???"), t.appendChild(u);
                                var l = new XMLHttpRequest();
                                l.open("GET", i, !0),
                                    (l.onreadystatechange = function () {
                                        4 == l.readyState &&
                                            (l.status < 400 && l.responseText
                                                ? ((u.textContent = l.responseText), r.highlightElement(u))
                                                : l.status >= 400
                                                ? (u.textContent = "??? Error " + l.status + " while fetching file: " + l.statusText)
                                                : (u.textContent = "??? Error: File does not exist or is empty"));
                                    }),
                                    l.send(null);
                            }),
                                r.plugins.toolbar &&
                                    r.plugins.toolbar.registerButton("download-file", function (e) {
                                        var t = e.element.parentNode;
                                        if (t && /pre/i.test(t.nodeName) && t.hasAttribute("data-src") && t.hasAttribute("data-download-link")) {
                                            var n = t.getAttribute("data-src"),
                                                r = document.createElement("a");
                                            return (r.textContent = t.getAttribute("data-download-link-label") || "Download"), r.setAttribute("download", ""), (r.href = n), r;
                                        }
                                    });
                        }),
                        document.addEventListener("DOMContentLoaded", self.Prism.fileHighlight));
                })();
        }.call(t, n(11)));
    },
    function (e, t, n) {
        "use strict";
        function r(e, t) {
            if (!Array.isArray(e)) throw new Error("shuffle expect an array as parameter.");
            t = t || {};
            var n,
                r,
                i = e,
                o = e.length,
                s = t.rng || Math.random;
            for (!0 === t.copy && (i = e.slice()); o; ) (n = Math.floor(s() * o)), (o -= 1), (r = i[o]), (i[o] = i[n]), (i[n] = r);
            return i;
        }
        (r.pick = function (e, t) {
            if (!Array.isArray(e)) throw new Error("shuffle.pick() expect an array as parameter.");
            t = t || {};
            var n = t.rng || Math.random,
                r = t.picks || 1;
            if ("number" == typeof r && 1 !== r) {
                for (var i, o = e.length, s = e.slice(), a = []; r && o; ) (i = Math.floor(n() * o)), a.push(s[i]), s.splice(i, 1), (o -= 1), (r -= 1);
                return a;
            }
            return e[Math.floor(n() * e.length)];
        }),
            (e.exports = r);
    },
    function (e, t, n) {
        var r, i, o;
        !(function (n, s) {
            (i = []), (r = s), void 0 !== (o = "function" == typeof r ? r.apply(t, i) : r) && (e.exports = o);
        })(0, function () {
            function e(e, t) {
                for (var n in e) e.hasOwnProperty(n) && t(e[n], n);
            }
            function t(t) {
                for (var n = 1; n < arguments.length; n++)
                    e(arguments[n], function (e, n) {
                        void 0 !== e && (t[n] = e);
                    });
                return t;
            }
            function n(e, n, i) {
                n = n || {};
                var o = n.hasOwnProperty("constructor")
                    ? n.constructor
                    : function () {
                          e
                              ? e.apply(this, arguments)
                              : (this.assignOptions && (this.writeOptions.apply(this, arguments), this.optionRules && this.validateOptions(this.options, this.optionRules)), this.initialize && this.initialize.apply(this, arguments));
                      };
                if (e) {
                    var s = function () {
                        this.constructor = o;
                    };
                    (s.prototype = e.prototype), (o.prototype = new s()), t(o, e);
                } else t(n, r);
                return i && t(o, i), t(o.prototype, n), o;
            }
            var r = {
                writeOptions: function (n) {
                    var r = "function" == typeof this.defaults ? this.defaults() : this.defaults,
                        i = {};
                    this.optionRules &&
                        e(this.optionRules, function (e, t) {
                            i[t] = e.default;
                        }),
                        (this.options = t({}, r, i, n));
                },
                validateOptions: function (t, n) {
                    var r = [];
                    if (
                        (e(n, function (e, n) {
                            var i = t[n],
                                o = typeof i;
                            (!1 === e.required && "undefined" === o) ||
                                (e.type && o !== e.type && r.push('Option "' + n + '" is ' + o + ", expected " + e.type + "."),
                                e.rule && !e.rule(i) && r.push('Option "' + n + '" breaks defined rule.'),
                                !e.instanceOf || i instanceof e.instanceOf || r.push('Option "' + n + '" is not instance of defined constructor.'));
                        }),
                        r.length)
                    )
                        throw new Error(r.join(" "));
                    return this;
                },
            };
            return function (e, t) {
                var r = n(null, e, t);
                return (
                    (r.extend = function (e, t) {
                        return n(this, e, t);
                    }),
                    r
                );
            };
        });
    },
    function (e, t) {
        var n;
        n = (function () {
            return this;
        })();
        try {
            n = n || Function("return this")() || (0, eval)("this");
        } catch (e) {
            "object" == typeof window && (n = window);
        }
        e.exports = n;
    },
    function (e, t, n) {
        !(function (t, n, r) {
            (e.exports = r()), (e.exports.default = r());
        })(0, 0, function () {
            function e(e, n) {
                if ("string" != typeof e) throw new Error("slugify: string argument expected");
                n = "string" == typeof n ? { replacement: n } : n || {};
                var r = e
                    .split("")
                    .reduce(function (e, r) {
                        return e + (t[r] || r).replace(n.remove || /[^\w\s$*_+~.()'"!\-:@]/g, "");
                    }, "")
                    .replace(/^\s+|\s+$/g, "")
                    .replace(/[-\s]+/g, n.replacement || "-")
                    .replace("#{replacement}$", "");
                return n.lower ? r.toLowerCase() : r;
            }
            var t = JSON.parse(
                '{"$":"dollar","&":"and","<":"less",">":"greater","|":"or","??":"cent","??":"pound","??":"currency","??":"yen","??":"(c)","??":"a","??":"(r)","??":"o","??":"A","??":"A","??":"A","??":"A","??":"A","??":"A","??":"AE","??":"C","??":"E","??":"E","??":"E","??":"E","??":"I","??":"I","??":"I","??":"I","??":"D","??":"N","??":"O","??":"O","??":"O","??":"O","??":"O","??":"O","??":"U","??":"U","??":"U","??":"U","??":"Y","??":"TH","??":"ss","??":"a","??":"a","??":"a","??":"a","??":"a","??":"a","??":"ae","??":"c","??":"e","??":"e","??":"e","??":"e","??":"i","??":"i","??":"i","??":"i","??":"d","??":"n","??":"o","??":"o","??":"o","??":"o","??":"o","??":"o","??":"u","??":"u","??":"u","??":"u","??":"y","??":"th","??":"y","??":"A","??":"a","??":"A","??":"a","??":"A","??":"a","??":"C","??":"c","??":"C","??":"c","??":"D","??":"d","??":"DJ","??":"dj","??":"E","??":"e","??":"E","??":"e","??":"e","??":"e","??":"E","??":"e","??":"G","??":"g","??":"G","??":"g","??":"I","??":"i","??":"i","??":"i","??":"I","??":"i","??":"I","??":"i","??":"k","??":"k","??":"L","??":"l","??":"L","??":"l","??":"N","??":"n","??":"N","??":"n","??":"N","??":"n","??":"O","??":"o","??":"OE","??":"oe","??":"R","??":"r","??":"S","??":"s","??":"S","??":"s","??":"S","??":"s","??":"T","??":"t","??":"T","??":"t","??":"U","??":"u","??":"u","??":"u","??":"U","??":"u","??":"U","??":"u","??":"U","??":"u","??":"Z","??":"z","??":"Z","??":"z","??":"Z","??":"z","??":"f","??":"O","??":"o","??":"U","??":"u","??":"LJ","??":"lj","??":"NJ","??":"nj","??":"S","??":"s","??":"T","??":"t","??":"o","??":"A","??":"E","??":"H","??":"I","??":"O","??":"Y","??":"W","??":"i","??":"A","??":"B","??":"G","??":"D","??":"E","??":"Z","??":"H","??":"8","??":"I","??":"K","??":"L","??":"M","??":"N","??":"3","??":"O","??":"P","??":"R","??":"S","??":"T","??":"Y","??":"F","??":"X","??":"PS","??":"W","??":"I","??":"Y","??":"a","??":"e","??":"h","??":"i","??":"y","??":"a","??":"b","??":"g","??":"d","??":"e","??":"z","??":"h","??":"8","??":"i","??":"k","??":"l","??":"m","??":"n","??":"3","??":"o","??":"p","??":"r","??":"s","??":"s","??":"t","??":"y","??":"f","??":"x","??":"ps","??":"w","??":"i","??":"y","??":"o","??":"y","??":"w","??":"Yo","??":"DJ","??":"Ye","??":"I","??":"Yi","??":"J","??":"LJ","??":"NJ","??":"C","??":"DZ","??":"A","??":"B","??":"V","??":"G","??":"D","??":"E","??":"Zh","??":"Z","??":"I","??":"J","??":"K","??":"L","??":"M","??":"N","??":"O","??":"P","??":"R","??":"S","??":"T","??":"U","??":"F","??":"H","??":"C","??":"Ch","??":"Sh","??":"Sh","??":"U","??":"Y","??":"","??":"E","??":"Yu","??":"Ya","??":"a","??":"b","??":"v","??":"g","??":"d","??":"e","??":"zh","??":"z","??":"i","??":"j","??":"k","??":"l","??":"m","??":"n","??":"o","??":"p","??":"r","??":"s","??":"t","??":"u","??":"f","??":"h","??":"c","??":"ch","??":"sh","??":"sh","??":"u","??":"y","??":"","??":"e","??":"yu","??":"ya","??":"yo","??":"dj","??":"ye","??":"i","??":"yi","??":"j","??":"lj","??":"nj","??":"c","??":"dz","??":"G","??":"g","???":"baht","???":"a","???":"b","???":"g","???":"d","???":"e","???":"v","???":"z","???":"t","???":"i","???":"k","???":"l","???":"m","???":"n","???":"o","???":"p","???":"zh","???":"r","???":"s","???":"t","???":"u","???":"f","???":"k","???":"gh","???":"q","???":"sh","???":"ch","???":"ts","???":"dz","???":"ts","???":"ch","???":"kh","???":"j","???":"h","???":"SS","???":"A","???":"a","???":"A","???":"a","???":"A","???":"a","???":"A","???":"a","???":"A","???":"a","???":"A","???":"a","???":"A","???":"a","???":"A","???":"a","???":"A","???":"a","???":"A","???":"a","???":"A","???":"a","???":"A","???":"a","???":"E","???":"e","???":"E","???":"e","???":"E","???":"e","???":"E","???":"e","???":"E","???":"e","???":"E","???":"e","???":"E","???":"e","???":"E","???":"e","???":"I","???":"i","???":"I","???":"i","???":"O","???":"o","???":"O","???":"o","???":"O","???":"o","???":"O","???":"o","???":"O","???":"o","???":"O","???":"o","???":"O","???":"o","???":"O","???":"o","???":"O","???":"o","???":"O","???":"o","???":"O","???":"o","???":"O","???":"o","???":"U","???":"u","???":"U","???":"u","???":"U","???":"u","???":"U","???":"u","???":"U","???":"u","???":"U","???":"u","???":"U","???":"u","???":"Y","???":"y","???":"Y","???":"y","???":"Y","???":"y","???":"Y","???":"y","???":"\'","???":"\'","???":"\\"","???":"\\"","???":"+","???":"*","???":"...","???":"ecu","???":"cruzeiro","???":"french franc","???":"lira","???":"mill","???":"naira","???":"peseta","???":"rupee","???":"won","???":"new shequel","???":"dong","???":"euro","???":"kip","???":"tugrik","???":"drachma","???":"penny","???":"peso","???":"guarani","???":"austral","???":"hryvnia","???":"cedi","???":"indian rupee","???":"russian ruble","???":"sm","???":"tm","???":"d","???":"delta","???":"sum","???":"infinity","???":"love","???":"yuan","???":"yen","???":"rial"}'
            );
            return (
                (e.extend = function (e) {
                    for (var n in e) t[n] = e[n];
                }),
                e
            );
        });
    },
    function (e, t, n) {
        var r,
            i,
            o = n(0),
            s = n(1),
            a = n(2),
            u = n(3),
            l = n(12);
        (r = a.extend({
            initialize: function () {
                this.addView(new i()), this.setupCodeHighlight(), this.setupAttireQueue(), this.mapView(".attireUserRepositories", u);
            },
        })),
            (i = s.extend({
                initialize: function () {
                    this.$el = this.setupElement();
                },
                events: {
                    "click > .toggleBtn": function (e) {
                        this.$el.toggleClass("isActive");
                    },
                },
            })),
            o(document).ready(function () {
                new r({ $el: "body" });
            });
    },
]);
