<!-- VTO widget scripts and styles -->
<script src="{{ asset('frontend/assets/vton/dist/VISIONVTOWidget.js') }}"></script>
<link rel='stylesheet' href=" {{ asset('frontend/assets/vton/css/VISIONVTOWidget.css') }}" />

<script>
    let _isResized = false;

    function test_resizeCanvas() {
        let halfHeightPx = Math.round(window.innerHeight / 2).toString() + 'rem';
        const domWidget = document.getElementById('VISIONVTOWidget');
        domWidget.style.maxHeight = (_isResized) ? 'none' : halfHeightPx;
        _isResized = !_isResized;
    }

    function get_initialSKU(){
        const queryString = window.location.search;
        const URLParams = new URLSearchParams(queryString);
        const sku = URLParams.get('sku');
        console.log('Initial SKU =', sku);
        return sku;
    }

    function get_isShadow(){
        const queryString = window.location.search;
        const URLParams = new URLSearchParams(queryString);
        return URLParams.get('isHideShadow') ? false : true;
    }

    function main() {
        VISIONVTOWIDGET.start({
            isShadow: get_isShadow(),
            sku: get_initialSKU(),
            searchImageMask: "{{ asset('frontend/assets/vton/images/logo.png') }}",
            searchImageColor: 0xeeeeee,
            callbackReady: function(){
                console.log('INFO: VTO is ready :)');
            },
            onError: function(errorLabel){
                alert('An error happened. errorLabel =' + errorLabel)
                switch(errorLabel) {
                    case 'WEBCAM_UNAVAILABLE':
                        break;
                    case 'NOFILE':
                        break;
                    case 'WRONGFILEFORMAT':
                        break;
                    case 'INVALID_SKU':
                        break;
                    case 'FALLBACK_UNAVAILABLE':
                        break;
                    case 'PLACEHOLDER_NULL_WIDTH':
                    case 'PLACEHOLDER_NULL_HEIGHT':
                        break;
                    case 'FATAL':
                    default:
                        break;
                }
            }
        });
    }

    function load_modelBySKU(){
        const sku = prompt('Please enter a glasses model SKU:', 'rayban_wayfarer_havane_marron');
        if (sku){
            VISIONVTOWIDGET.load(sku);
        }

    }
</script>

<div class='content'>
    <div id='VISIONVTOWidget'>
        <canvas id='VISIONVTOWidgetCanvas'></canvas>
        <div class='VISIONVTOWidgetControls VISIONVTOWidgetControlsTop'>
            <button class="jbutton" id='VISIONVTOWidgetAdjust'>
                <div class="buttonIcon"><i class="fas fa-arrows-alt"></i></div>Adjust
            </button>
        </div>
        <div class='VISIONVTOWidgetControls' id='VISIONVTOWidgetChangeModelContainer'>
            <button class="jbutton" onclick="VISIONVTOWIDGET.load('rayban_aviator_or_vertFlash')">Model 1</button>
            <button class="jbutton" onclick="VISIONVTOWIDGET.load('rayban_round_cuivre_pinkBrownDegrade')">Model 2</button>
            <button class="jbutton" onclick="load_modelBySKU()">by SKU</button>
        </div>
        <div id='VISIONVTOWidgetAdjustNotice'>
            Move the glasses to adjust them.
            <button class="jbutton" class='VISIONVTOWidgetBottomButton' id='VISIONVTOWidgetAdjustExit' onclick="VISIONVTOWidget.exit_adjustMode()">Quit</button>
        </div>
        <div id='VISIONVTOWidgetLoading'>
            <div class='VISIONVTOWidgetLoadingText'>
                LOADING...
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', main);
</script>
