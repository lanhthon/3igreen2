/**
 * Browser Polyfills & Feature Detection
 * Hỗ trợ tất cả trình duyệt bao gồm IE11, Safari cũ, Firefox cũ
 */

(function() {
    'use strict';

    // ==================== FEATURE DETECTION ====================

    /**
     * Kiểm tra hỗ trợ WebGL cho Three.js
     */
    function detectWebGL() {
        try {
            const canvas = document.createElement('canvas');
            const gl = canvas.getContext('webgl') || canvas.getContext('experimental-webgl');
            if (!gl) {
                console.warn('WebGL not supported. 3D features may not work.');
                showWebGLWarning();
                return false;
            }
            return true;
        } catch(e) {
            console.error('WebGL detection failed:', e);
            showWebGLWarning();
            return false;
        }
    }

    /**
     * Hiển thị cảnh báo nếu WebGL không được hỗ trợ
     */
    function showWebGLWarning() {
        const canvas = document.querySelector('#c');
        if (canvas) {
            const warning = document.createElement('div');
            warning.style.cssText = 'position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);background:#fff;padding:2rem;border-radius:8px;box-shadow:0 4px 16px rgba(0,0,0,0.2);max-width:500px;text-align:center;z-index:10000;';
            warning.innerHTML = '<h3 style="color:#FF6B35;margin-bottom:1rem;">Trình duyệt không hỗ trợ WebGL</h3><p>Vui lòng cập nhật trình duyệt hoặc bật WebGL để xem mô hình 3D.</p>';
            canvas.parentElement.appendChild(warning);
        }
    }

    // ==================== POLYFILLS ====================

    /**
     * Polyfill cho requestAnimationFrame
     */
    (function() {
        var lastTime = 0;
        var vendors = ['webkit', 'moz', 'ms', 'o'];

        for(var x = 0; x < vendors.length && !window.requestAnimationFrame; ++x) {
            window.requestAnimationFrame = window[vendors[x]+'RequestAnimationFrame'];
            window.cancelAnimationFrame = window[vendors[x]+'CancelAnimationFrame'] ||
                                         window[vendors[x]+'CancelRequestAnimationFrame'];
        }

        if (!window.requestAnimationFrame) {
            window.requestAnimationFrame = function(callback) {
                var currTime = new Date().getTime();
                var timeToCall = Math.max(0, 16 - (currTime - lastTime));
                var id = window.setTimeout(function() {
                    callback(currTime + timeToCall);
                }, timeToCall);
                lastTime = currTime + timeToCall;
                return id;
            };
        }

        if (!window.cancelAnimationFrame) {
            window.cancelAnimationFrame = function(id) {
                clearTimeout(id);
            };
        }
    })();

    /**
     * Polyfill cho CustomEvent (IE11)
     */
    (function() {
        if (typeof window.CustomEvent === "function") return false;

        function CustomEvent(event, params) {
            params = params || { bubbles: false, cancelable: false, detail: null };
            var evt = document.createEvent('CustomEvent');
            evt.initCustomEvent(event, params.bubbles, params.cancelable, params.detail);
            return evt;
        }

        window.CustomEvent = CustomEvent;
    })();

    /**
     * Polyfill cho Element.closest() (IE11)
     */
    if (!Element.prototype.closest) {
        Element.prototype.closest = function(s) {
            var el = this;
            do {
                if (Element.prototype.matches.call(el, s)) return el;
                el = el.parentElement || el.parentNode;
            } while (el !== null && el.nodeType === 1);
            return null;
        };
    }

    /**
     * Polyfill cho Element.matches() (IE11)
     */
    if (!Element.prototype.matches) {
        Element.prototype.matches = Element.prototype.msMatchesSelector ||
                                    Element.prototype.webkitMatchesSelector;
    }

    /**
     * Polyfill cho Array.from() (IE11)
     */
    if (!Array.from) {
        Array.from = (function() {
            var toStr = Object.prototype.toString;
            var isCallable = function(fn) {
                return typeof fn === 'function' || toStr.call(fn) === '[object Function]';
            };
            var toInteger = function(value) {
                var number = Number(value);
                if (isNaN(number)) return 0;
                if (number === 0 || !isFinite(number)) return number;
                return (number > 0 ? 1 : -1) * Math.floor(Math.abs(number));
            };
            var maxSafeInteger = Math.pow(2, 53) - 1;
            var toLength = function(value) {
                var len = toInteger(value);
                return Math.min(Math.max(len, 0), maxSafeInteger);
            };

            return function from(arrayLike) {
                var C = this;
                var items = Object(arrayLike);
                if (arrayLike == null) {
                    throw new TypeError('Array.from requires an array-like object - not null or undefined');
                }

                var mapFn = arguments.length > 1 ? arguments[1] : void undefined;
                var T;
                if (typeof mapFn !== 'undefined') {
                    if (!isCallable(mapFn)) {
                        throw new TypeError('Array.from: when provided, the second argument must be a function');
                    }
                    if (arguments.length > 2) {
                        T = arguments[2];
                    }
                }

                var len = toLength(items.length);
                var A = isCallable(C) ? Object(new C(len)) : new Array(len);
                var k = 0;
                var kValue;
                while (k < len) {
                    kValue = items[k];
                    if (mapFn) {
                        A[k] = typeof T === 'undefined' ? mapFn(kValue, k) : mapFn.call(T, kValue, k);
                    } else {
                        A[k] = kValue;
                    }
                    k += 1;
                }
                A.length = len;
                return A;
            };
        }());
    }

    /**
     * Polyfill cho Object.assign() (IE11)
     */
    if (typeof Object.assign !== 'function') {
        Object.defineProperty(Object, "assign", {
            value: function assign(target, varArgs) {
                'use strict';
                if (target === null || target === undefined) {
                    throw new TypeError('Cannot convert undefined or null to object');
                }

                var to = Object(target);

                for (var index = 1; index < arguments.length; index++) {
                    var nextSource = arguments[index];

                    if (nextSource !== null && nextSource !== undefined) {
                        for (var nextKey in nextSource) {
                            if (Object.prototype.hasOwnProperty.call(nextSource, nextKey)) {
                                to[nextKey] = nextSource[nextKey];
                            }
                        }
                    }
                }
                return to;
            },
            writable: true,
            configurable: true
        });
    }

    /**
     * Polyfill cho String.prototype.includes() (IE11)
     */
    if (!String.prototype.includes) {
        String.prototype.includes = function(search, start) {
            'use strict';
            if (search instanceof RegExp) {
                throw TypeError('first argument must not be a RegExp');
            }
            if (start === undefined) { start = 0; }
            return this.indexOf(search, start) !== -1;
        };
    }

    /**
     * Polyfill cho Array.prototype.find() (IE11)
     */
    if (!Array.prototype.find) {
        Object.defineProperty(Array.prototype, 'find', {
            value: function(predicate) {
                if (this == null) {
                    throw TypeError('"this" is null or not defined');
                }

                var o = Object(this);
                var len = o.length >>> 0;

                if (typeof predicate !== 'function') {
                    throw TypeError('predicate must be a function');
                }

                var thisArg = arguments[1];
                var k = 0;

                while (k < len) {
                    var kValue = o[k];
                    if (predicate.call(thisArg, kValue, k, o)) {
                        return kValue;
                    }
                    k++;
                }

                return undefined;
            },
            configurable: true,
            writable: true
        });
    }

    /**
     * Polyfill cho Number.isNaN() (IE11)
     */
    if (!Number.isNaN) {
        Number.isNaN = function(value) {
            return typeof value === 'number' && isNaN(value);
        };
    }

    // ==================== BROWSER-SPECIFIC FIXES ====================

    /**
     * Fix cho Safari iOS - Viewport Height
     */
    function fixiOSViewportHeight() {
        const appHeight = function() {
            const doc = document.documentElement;
            doc.style.setProperty('--vh', (window.innerHeight * 0.01) + 'px');
        };
        window.addEventListener('resize', appHeight);
        appHeight();
    }

    /**
     * Fix cho smooth scroll trên Safari cũ
     */
    function polyfillSmoothScroll() {
        if (!('scrollBehavior' in document.documentElement.style)) {
            // Import smooth-scroll polyfill nếu cần
            var links = document.querySelectorAll('a[href^="#"]');
            links.forEach(function(link) {
                link.addEventListener('click', function(e) {
                    var target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        e.preventDefault();
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        }
    }

    /**
     * Performance monitoring
     */
    function monitorPerformance() {
        if ('PerformanceObserver' in window) {
            try {
                const perfObserver = new PerformanceObserver(function(list) {
                    for (const entry of list.getEntries()) {
                        if (entry.duration > 100) {
                            console.warn('Slow operation detected:', entry.name, entry.duration + 'ms');
                        }
                    }
                });
                perfObserver.observe({ entryTypes: ['measure', 'navigation'] });
            } catch (e) {
                console.log('Performance monitoring not available');
            }
        }
    }

    /**
     * Lazy loading images fallback
     */
    function initLazyLoading() {
        if ('loading' in HTMLImageElement.prototype) {
            // Native lazy loading được hỗ trợ
            return;
        }

        // Fallback cho trình duyệt không hỗ trợ
        var lazyImages = document.querySelectorAll('img[loading="lazy"]');
        if (lazyImages.length > 0) {
            var imageObserver = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        var image = entry.target;
                        if (image.dataset.src) {
                            image.src = image.dataset.src;
                            imageObserver.unobserve(image);
                        }
                    }
                });
            });

            lazyImages.forEach(function(img) {
                imageObserver.observe(img);
            });
        }
    }

    /**
     * Console warning cho IE11
     */
    function warnOldBrowsers() {
        var ua = window.navigator.userAgent;
        var msie = ua.indexOf('MSIE ');
        var trident = ua.indexOf('Trident/');

        if (msie > 0 || trident > 0) {
            console.warn('Bạn đang sử dụng Internet Explorer. Để có trải nghiệm tốt nhất, vui lòng sử dụng Chrome, Firefox, hoặc Edge.');

            // Tùy chọn: Hiển thị banner cảnh báo
            var warning = document.createElement('div');
            warning.style.cssText = 'position:fixed;top:0;left:0;right:0;background:#FFD93D;color:#0A1628;padding:1rem;text-align:center;z-index:10001;font-weight:600;';
            warning.innerHTML = 'Để có trải nghiệm tốt nhất, vui lòng sử dụng Chrome, Firefox, hoặc Edge. <button onclick="this.parentElement.remove()" style="margin-left:1rem;padding:0.5rem 1rem;background:#94C842;color:white;border:none;border-radius:4px;cursor:pointer;">Đóng</button>';
            document.body.insertBefore(warning, document.body.firstChild);
        }
    }

    // ==================== INITIALIZATION ====================

    /**
     * Initialize all polyfills and fixes
     */
    function init() {
        console.log('Browser compatibility layer loaded');

        // Detect features
        detectWebGL();

        // Apply fixes
        fixiOSViewportHeight();
        polyfillSmoothScroll();
        initLazyLoading();
        warnOldBrowsers();

        // Performance monitoring (development only)
        if (window.location.hostname === 'localhost' || window.location.hostname === '127.0.0.1') {
            monitorPerformance();
        }

        // Log browser info
        console.log('Browser:', navigator.userAgent);
        console.log('WebGL Support:', detectWebGL());
    }

    // Run on DOM ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

})();
