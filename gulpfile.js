
const {src,dest,watch, parallel}=require("gulp");

//css
const    sass   =require("gulp-sass")(require("sass"));
const    plumber=require("gulp-plumber");
const autoprefixer=require("autoprefixer");
const cssnano=require("cssnano");
const postcss=require("gulp-postcss");
const sourcemaps=require("gulp-sourcemaps");

//imagènes
const avif=require("gulp-avif");
const cache=require("gulp-cache");
const webp=require("gulp-webp");
const imagemin=require("gulp-imagemin");

//javaScript
const terser=require("gulp-terser-js");
const concat = require('gulp-concat');

function CSS(done){

    src("src/scss/**/*.scss")
        .pipe(sourcemaps.init())
        .pipe(plumber())
        .pipe(sass())
        .pipe(postcss([autoprefixer(),cssnano()]))
        .pipe(sourcemaps.write('.'))
        .pipe(dest("build/css"));


    done();

}


function javaScript(done) {
    src("src/js/**/*.js")
        .pipe(sourcemaps.init())
        .pipe(concat('bundle.js'))
        .pipe(terser())
        .pipe(sourcemaps.write('.'))
        .pipe(dest("build/js"))
        

    done();
}



function imagenes(done) {

    const opciones={
        optimizationLevel:3
    }
    src("img/**/*.{jpg,png}")
        .pipe(cache(imagemin(opciones)))
        .pipe(dest("build/img"))
    

    done();
}

function versionWebp(done){

    const opciones={
        quality:50
    };

    src("img/**/*.{jpg,png}")
        .pipe(webp(opciones))
        .pipe(dest("build/img"))


    done();
}


function versionAvif(done){

    const opciones={
        quality:50
    };

    src("img/**/*.{jpg,png}")
        .pipe(avif(opciones))
        .pipe(dest("build/img"))


    done();
}

function watchArchivos() {
    watch("src/scss/**/*.scss", CSS);
    watch("src/js/**/*.js", javaScript);
  
}

exports.default=parallel(CSS, javaScript,watchArchivos );
exports.versionWebp=versionWebp;
exports.imagemin=imagenes;
exports.versionAvif=versionAvif;
exports.CSS=CSS;


