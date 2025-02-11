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
var __param = (this && this.__param) || function (paramIndex, decorator) {
    return function (target, key) { decorator(target, key, paramIndex); }
};
Object.defineProperty(exports, "__esModule", { value: true });
exports.VotePresidentService = void 0;
const common_1 = require("@nestjs/common");
const typeorm_1 = require("@nestjs/typeorm");
const typeorm_2 = require("typeorm");
const vote_president_entity_1 = require("./vote-president.entity");
let VotePresidentService = class VotePresidentService {
    constructor(votePresidentRepository) {
        this.votePresidentRepository = votePresidentRepository;
    }
    async updateVote(login_email, candidate) {
        const user = await this.votePresidentRepository.findOne({ where: { login_email } });
        if (!user) {
            throw new Error('Login erroné, corrigez ou contactez l’administrateur');
        }
        if (user.etat_vote === 1) {
            throw new Error('Vous avez déjà voté !');
        }
        user[candidate] = 1;
        user.etat_vote = 1;
        user.date_heure_cnx = new Date();
        await this.votePresidentRepository.save(user);
        return { message: 'Vote enregistré avec succès' };
    }
};
exports.VotePresidentService = VotePresidentService;
exports.VotePresidentService = VotePresidentService = __decorate([
    (0, common_1.Injectable)(),
    __param(0, (0, typeorm_1.InjectRepository)(vote_president_entity_1.VotePresident)),
    __metadata("design:paramtypes", [typeorm_2.Repository])
], VotePresidentService);
//# sourceMappingURL=vote-president.service.js.map