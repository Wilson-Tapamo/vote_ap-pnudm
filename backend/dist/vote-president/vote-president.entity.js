"use strict";
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};
Object.defineProperty(exports, "__esModule", { value: true });
exports.VotePresident = void 0;
const typeorm_1 = require("typeorm");
let VotePresident = class VotePresident {
};
exports.VotePresident = VotePresident;
__decorate([
    (0, typeorm_1.PrimaryColumn)(),
    __metadata("design:type", Number)
], VotePresident.prototype, "numero_electeur", void 0);
__decorate([
    (0, typeorm_1.Column)(),
    __metadata("design:type", String)
], VotePresident.prototype, "nom_prenom_electeur", void 0);
__decorate([
    (0, typeorm_1.Column)(),
    __metadata("design:type", String)
], VotePresident.prototype, "login_email", void 0);
__decorate([
    (0, typeorm_1.Column)(),
    __metadata("design:type", String)
], VotePresident.prototype, "mot_passe", void 0);
__decorate([
    (0, typeorm_1.Column)(),
    __metadata("design:type", String)
], VotePresident.prototype, "sexe", void 0);
__decorate([
    (0, typeorm_1.Column)(),
    __metadata("design:type", Number)
], VotePresident.prototype, "etat_vote", void 0);
__decorate([
    (0, typeorm_1.Column)({ nullable: true }),
    __metadata("design:type", Date)
], VotePresident.prototype, "date_heure_cnx", void 0);
__decorate([
    (0, typeorm_1.Column)(),
    __metadata("design:type", Number)
], VotePresident.prototype, "Djeneba_Diawara", void 0);
__decorate([
    (0, typeorm_1.Column)(),
    __metadata("design:type", Number)
], VotePresident.prototype, "Faran_Sidibe", void 0);
__decorate([
    (0, typeorm_1.Column)(),
    __metadata("design:type", Number)
], VotePresident.prototype, "Moussa_Diomande", void 0);
__decorate([
    (0, typeorm_1.Column)(),
    __metadata("design:type", Number)
], VotePresident.prototype, "Vote_Blanc", void 0);
exports.VotePresident = VotePresident = __decorate([
    (0, typeorm_1.Entity)('T_vote_president')
], VotePresident);
//# sourceMappingURL=vote-president.entity.js.map