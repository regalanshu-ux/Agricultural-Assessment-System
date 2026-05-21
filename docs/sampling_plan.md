Stratified Sampling Plan — National Coverage

1. Objective
- Provide a representative sample for estimating land-holding patterns, irrigation sources, cropping patterns, and well depths at national and stratum (state/agro-ecological) levels.

2. Spatial & temporal scope
- Spatial: national coverage; strata = states × major agro-ecological zones (AEZs). Administrative units used for reporting: national, state, district (where sample density allows).
- Temporal: primary survey in one agricultural year covering main cropping seasons; repeat (panel) recommended after 1–3 years for trends.

3. Stratification
- Primary strata: each state (or union territory).
- Secondary strata: within each state, split by AEZ or by agro-climatic zone and irrigation intensity (high/medium/low).
- Rationale: reduces variance for cropping and water-related variables.

4. Sampling design (three-stage recommended)
- Stage 1 (PSU selection): Select districts (or sub-districts) within each stratum using Probability Proportional to Size (PPS), where size = number of agricultural households or cultivated area.
- Stage 2 (Cluster selection): Within selected districts, select villages or census enumeration areas (EA) as clusters (random or PPS). Target ~30 clusters per stratum where feasible.
- Stage 3 (Household/well selection): In each cluster, list agricultural households and wells; randomly select 8–15 households per cluster and sample all productive wells for those households or select 1–2 wells per household depending on study focus.

5. Sample-size guidance
- Baseline formula for simple random sample: n = (Z^2 * p * (1-p)) / e^2. Use p = 0.5, Z = 1.96, e = 0.05 → n ≈ 384.
- Adjust for design effect (DEFF). With clustering, use DEFF = 1.5–2.0. Multiplying gives ~576–768.
- For reliable stratum-level estimates, aim for at least 400–600 completed sampling units per stratum. If national only, a total sample of ~1,000–2,000 households with ~100–300 clusters is reasonable.
- Practical rule: 30 clusters × 10 households = 300 households per stratum (minimum). Increase clusters rather than household-per-cluster to reduce intra-cluster correlation impacts.

6. Allocation
- Prefer proportional allocation by stratum size, with minimum floor (e.g., 300 units) to ensure analytic power.
- For focused district-level estimates, use domain oversampling in selected districts and apply survey weights.

7. PSU & cluster rules
- Use official census or agricultural household lists to construct PSU frame. If unavailable, use remote-sensed cultivated-area rasters to approximate size for PPS.
- Urban/rural split: restrict to rural/agricultural localities; exclude purely urban centers unless peri-urban agriculture is in scope.

8. Selection protocol (brief)
- Obtain up-to-date sampling frame (census, agricultural registry).
- Compute PPS probabilities for Stage 1; draw districts using systematic PPS sampling.
- Within each selected district, list clusters and draw clusters randomly or by PPS.
- For each cluster, perform household listing (or use existing lists) then randomly select households.
- Record refusal and non-response and replace following a pre-defined rule (e.g., next random household). Log substitution cause.

9. Field measurement protocols (minimum)
- Location: record GPS (WGS84) for every sampled household, well, and field plot.
- Well depth: measure with calibrated measuring tape or electronic sounder; record static water level and depth to top and bottom of casing; note well type (borewell, dugwell), year drilled, pump type, and yield estimates.
- Irrigation source: classify as canal, groundwater (tube well, shallow well), tank/pond, rainfed; record seasonality and reliability (months available).
- Cropping pattern: collect farmer-reported cropping calendar for past 12 months; record area by crop, crop sequence, and yields. Cross-check with latest satellite-derived crop classification for the same seasons.
- Land holding: collect total operated area, ownership vs tenancy, number of plots, plot sizes, and distance to water source.

10. Data instruments & coding
- Prepare electronic forms (ODK, KoboToolbox, SurveyCTO) with GPS capture, constrained fields, and skip logic.
- Core variables: household ID, GPS, farm area, tenure, irrigation sources (type/months), well depth (m), well gps, crop list (area, season, yield), socio-econ markers (age, sex, primary occupation), sampling weights, cluster ID.

11. Quality control
- Team training, spot checks, back-checks (5–10% of interviews), timestamped photos of wells and fields, automated range checks in forms, and weekly data review.

12. Weighting & analysis
- Compute sample weights as inverse of selection probability (product of stage probabilities) and apply post-stratification adjustments to known population totals if available.
- Use survey-aware estimation (R `survey` package or Python `statsmodels`/`survey`-like tools) for means, proportions, and regressions.

13. Remote sensing integration
- Map cropping extent by season using Sentinel-2 / Landsat; validate with field labels. Use high-res satellite imagery to identify irrigated area proxies and number of wells (where visible) and to guide PSU selection when frames are outdated.

14. Timeline & resources (high-level)
- Frame preparation & instrument design: 4–6 weeks.
- Pilot (1–2 states): 2–4 weeks.
- Field data collection (national): 8–16 weeks depending on team size and geography.
- Data cleaning & analysis: 6–10 weeks.

15. Deliverables
- Sampling frame and selection code (reproducible scripts).
- Field tools (`forms/` ODK/Kobo XML or XLSX saved separately).
- Cleaned sample dataset with weights and metadata.
- Maps and summary tables for national and stratum levels.

16. Notes & options
- If budget is constrained, consider remote-sensing-first approach and targeted field validation (hybrid design).
- For groundwater details, coordinate with local hydrogeological agencies to obtain well-log databases to supplement field-measured depths.

---

Files to add next: field instrument templates and selection scripts.
